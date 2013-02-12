(function() {
  // Retrieve the client id from the Google APIs Console at
  //     https://code.google.com/apis/console
  var OAUTH2_CLIENT_ID = '417962690242-svhm8jbuan79309talmbltp3uql1vtuj.apps.googleusercontent.com';
  var OAUTH2_SCOPES = [
    'https://www.googleapis.com/auth/yt-analytics.readonly',
    'https://gdata.youtube.com'
  ];
  var ONE_MONTH_IN_MILLISECONDS = 1000 * 60 * 60 * 24 * 30;

  google.load('visualization', '1.0', {'packages': ['corechart']});

  // This method generates request headers for YouTube Data API (v2.0) requests.
  function generateYouTubeApiHeaders() {
    return {
      // Do not cache this value since we always want to retrieve a fresh access token.
      Authorization: OAUTH2_TOKEN_TYPE + ' ' + gapi.auth.getToken().access_token,
      'GData-Version': 2
    };
  }

  // The Google APIs JS client automatically invokes this callback upon loading.
  window.onJSClientLoad = function() {
    window.setTimeout(checkAuth, 1);
  };

  // Try to authorize the currently logged-in user and send the result of that
  // attempt to the handleAuthResult function. If the user previously
  // authorized the sample app, the user won't need to reauthorize. Otherwise, the
  // UI will prompt the user to authorize the sample app.
  function checkAuth() {
    gapi.auth.authorize({
      client_id: OAUTH2_CLIENT_ID,
      scope: OAUTH2_SCOPES,
      immediate: true
    }, handleAuthResult);
  }

  // This function handles the result of a gapi.auth.authorize() call.
  function handleAuthResult(authResult) {
    if (authResult) {
      // Auth succeeded. Hide auth prompt and proceed to the next step.
      $('.pre-auth').hide();
      $('.post-auth').show();
      displayMessage("Authenticated.");
      gapi.client.load('youtubeAnalytics', 'v1', function() {
        getUserId();
        getVideoList();
      });
    } else {
      // Auth failed. Show auth prompt. Hide items that appear after successful auth.
      $('.post-auth').hide();
      $('.pre-auth').show();
      // Make the authorization link (in the login-link element) clickable and
      // Also, define an event listener that attempts a non-immediate OAuth 2.0 client
      // flow when the link is clicked and sends the result of that attempt to the
      // handleAuthResult function.
      $('#login-link').click(function() {
        gapi.auth.authorize({
          client_id: OAUTH2_CLIENT_ID,
          scope: OAUTH2_SCOPES,
          immediate: false
        }, handleAuthResult);
      });
    }
  }

  // Helper method to display a message on the page.
  function displayMessage(message) {
    $('#message').text(message).show();
  }

  // Helper method to hide a previously displayed message on the page.
  function hideMessage() {
    $('#message').hide();
  }

  // Store the YouTube user ID of the currently authenticated user.
  var channelId;

  // Retrieve the currently authenticated user's ID from the YouTube Data API.
  function getUserId() {
    return $.ajax({
      type: 'GET',
      url: 'https://gdata.youtube.com/feeds/api/users/default?alt=json',
      headers: generateYouTubeApiHeaders(),
      dataType: 'json',
      success: function(response) {
        // Store the user ID for later use.
        channelId = response['entry']['yt$channelId']['$ethiocinemas'];
        displayMessage('YouTube user id is ' + channelId);
      },
      error: function(jqXHR) {
        displayMessage(jqXHR.responseText);
      }
    });
  }

  // Retrieve the currently authenticated user's uploaded videos feed.
  function getVideoList() {
    $.ajax({
      type: 'GET',
      url: 'https://gdata.youtube.com/feeds/api/users/default/uploads?alt=jsonc&max-results=50',
      headers: generateYouTubeApiHeaders(),
      dataType: 'json',
      success: function(response) {
        // Get the jQuery wrapper for #video-list once outside the loop.
        var videoList = $('#video-list');
        $.each(response.data.items, function() {
          // Exclude videos with no views since they will not have Analytics data.
          if (!('viewCount' in this) || this.viewCount == 0) {
            return;
          }
  
          var title = this.title;
          var videoId = this.id;
  
          // Create a clickable list item and set the video title as its text content.
          var liElement = $('<li>');
          liElement.text(title);
          liElement.click(function() {
            // Display the video ID of the video that was clicked.
            displayMessage('You clicked on video id ' + videoId);
            displayVideoAnalytics(videoId);
          });

          // Call the jQuery.append() method to add the item to the parent list.
          videoList.append(liElement);
        });
      },
      error: function(jqXHR) {
        displayMessage(jqXHR.responseText);
      }
    });
  }

  // Take a Date object and return a YYYY-MM-DD string.
  function formatDateString(date) {
    var yyyy = date.getFullYear().toString();
    var mm = padToTwoCharacters(date.getMonth() + 1);
    var dd = padToTwoCharacters(date.getDate());
    return yyyy + '-' + mm + '-' + dd;
  }

  // Return two-digit numbers as a string. Prepend '0' to one-digit numbers and return.
  function padToTwoCharacters(number) {
    if (number < 10) {
      return '0' + number;
    } else {
      return number.toString();
    }
  }

  // Request and display Analytics data for the specified video. This function
  // retrieves data for a 30-day window. Modify the ONE_MONTH_IN_MILLISECONDS value to
  // change the length of that window or use a parameter to specify the date range.
  function displayVideoAnalytics(videoId) {
    if (channelId) {
      var today = new Date();
      var lastWeek = new Date(today.getTime() - ONE_MONTH_IN_MILLISECONDS);

      var request = gapi.client.youtubeAnalytics.reports.query({
        // Convert dates to YYYY-MM-DD strings for start-date and end-date parameters.
        'start-date': formatDateString(lastWeek),
        'end-date': formatDateString(today),
        // Identify channel for which you're retrieving data.
        ids: 'channel==' + channelId,
        dimensions: 'day',
        metrics: 'views',
        filters: 'video==' + videoId
      });
      request.execute(function(response) {
        // Call this function whether the request succeeds or not. The response will
        // either contain valid Analytics data or an explanation of the error.
        if ('error' in response) {
          displayMessage(response.error.message);
        } else {
          displayMessage(JSON.stringify(response));
          displayChart(videoId, response);
        }
      });
    } else {
      displayMessage('The current user\'s YouTube user ID is not available.');
    }
  }

  function displayChart(videoId, response) {
    if ('rows' in response) {
      hideMessage();

      // Reformat the 'columnHeaders' property value as a simple array.
      var columns = $.map(response.columnHeaders, function(item) {
        return item.name;
      });
      // Pass an array of arrays to the google.visualization.arrayToDataTable()
      // function. The first array element contains column headers identifying the
      // metrics and dimensions in the data; remaining elements contain rows of data.
      var chartDataArray = [columns].concat(response.rows);
      var chartDataTable = google.visualization.arrayToDataTable(chartDataArray);
      var chart = new google.visualization.LineChart(document.getElementById('chart'));
      chart.draw(chartDataTable, {
        // For more information about additional options, see:
        // https://developers.google.com/chart/interactive/docs/reference#visdraw
        title: 'Views per Day of Video ' + videoId
      });
    } else {
      displayMessage('No data available for video ' + videoId);
    }
  }

  /* In later steps, add additional functions above this line. */
})();