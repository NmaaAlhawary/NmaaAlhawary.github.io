<?php include('header.php');?>
<title>Course Schedule</title>
</head>


<body>
    <?php include('layout/navigation.php'); ?>
    <div class="container">
        <div id="pageTopElements" class="d-flex justify-content-between">
        </div>
        <div class="row flex-wrap min-vh-100">
            <div class="col py-3 mx-4">
                <h2 class="pageTitle">Course Schedule</h2>
                <div id="pageTopElements" class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 id="courseName"></h4>
                    </div>
                    </p>
                </div>
                <div id="courseScheduleContainer">
                    <p class="">Here is the recommended schedule for this course depending on the sutudents'
                        prefernces
                    <table class="table table-striped" id="courseSchedulesTable">
                        <thead>
                            <tr>
                                <th scope="col">Day</th>
                                <th scope="col">Time</th>
                                <th scope="col">Number of Preferences</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table rows will be added dynamically using jQuery -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
    var itemsArray = ['Operating Systems', 'Database Programming', 'Advanced Software Engineering', 'Compiler Design',
        'Electronic Commerce', 'Advanced Computer Architecture', 'Systems Programming', 'Application Development ',
        'Network Security ', 'Business Intelligence', 'Advanced Programming ',
        'Managing a Successful Computing Project',
        'Fundamentals of Computing', 'Security', 'Database Design & Development ', 'Networking',
        'Computer Systems Architecture', 'Data Analytics', 'Software Development Lifecycles',
        'Programming', 'Website Design And Development', 'Programming', 'Maths for Computing',
    ];


    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
    var courseName = getParameterByName('courseName');
    $('#courseName').text(courseName);
    $('#showScheduleBtn').on('click', function() {
        var selectedCourse = $('#courseSelect').val();

        createTableRows(selectedCourse);
    });
    var coursePreferencesArray = [{
            day: 'Monday, Thursday',
            time: '08:30-12:30',
            numberOfPreferences: 5
        },
        {
            day: 'Satarday, Tuesday',
            time: '12:30-04:30',
            numberOfPreferences: 8
        },
        {
            day: 'Sunday, Wednesday',
            time: '08:30-12:30',
            numberOfPreferences: 3
        },
    ];

    function createTableRows() {
        var tableBody = $('#courseSchedulesTable tbody');

        tableBody.empty();

        coursePreferencesArray.sort(function(a, b) {
            return b.numberOfPreferences - a.numberOfPreferences;
        });

        for (var i = 0; i < coursePreferencesArray.length; i++) {
            var row = $('<tr>');
            row.append($('<td>', {
                text: coursePreferencesArray[i].day
            }));
            row.append($('<td>', {
                text: coursePreferencesArray[i].time
            }));
            row.append($('<td>', {
                text: coursePreferencesArray[i].numberOfPreferences
            }));
            tableBody.append(row);
        }
    }

    createTableRows();
    </script>
    <?php include('footer.php'); ?>
</body>

</html>