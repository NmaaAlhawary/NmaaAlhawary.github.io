<?php include('header.php');?>
<title>Home</title>
</head>

<body>
    <?php include('layout/navigation.php'); ?>
    <div class="container">
        <div class="main">
            <div class="d-flex align-items-center justify-content-between my-3">
                <h2 id="" class=""> Dummy Registeration Dashboard</h2>
                <div class="col-md-4 text-right"> <button id="exporttable" class="btn btn-primary">Export Courses
                        Sections Preferences<i class="fa-solid fa-file-export ml-3"></i></button></div>
            </div>
            <section class="mainContent mb-5">
                <div class="card-deck">
                    <div class="card col-4 d-flex align-items-center" style="background-color: #fff8f0;">
                        <a href="" class="card-link">
                            <div class="card-body hoveredText">
                                <h2 class="card-title"><strong>65%</strong></h2>
                                <p class="card-text">Of the faculty students have participated in the system</p>
                            </div>
                        </a>
                    </div>
                    <div class="card col-4 d-flex align-items-center" style="background-color: #fff8f0;">
                        <a href="SchedulePreferences.php" class="card-link">
                            <div class="card-body hoveredText">
                                <h4 class="card-title"><strong>Schedule Preferences</strong></h4>
                                <p class="card-text">View the prefered courses and schedules by the faculty students
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="card col-4" style="height: 300px;" id="donut-chart" style="background-color: #fff8f0;">
                        <!-- <a href="" class="card-link">
                            <div class="card-body hoveredText">
                                <h2 class="card-title"><strong>65%</strong></h2>
                                <p class="card-text">Of the faculty students have participated in the system</p>
                            </div>
                        </a> -->
                    </div>
                </div>
            </section>
        </div>
        <div class="container">
            <h3 class="">Course Section Preferences</h3>
            <div id="" class="col-6">
                <label for="courseSelect">Select a Course</label>
                <div class="input-group mb-3">
                    <select class="form-select" id="courseSelect" aria-label="Default select example">
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary align-center" style="height: 38px;" id="showScheduleBtn">Show
                            Schedule</button>
                    </div>
                </div>
            </div>
            <div class="row flex-wrap mb-5">
                <div class="col mx-4">
                    <div id="pageTopElements" class="d-flex align-items-center justify-content-between">
                        <div>
                            <h5 id="courseName"></h5>
                        </div>
                    </div>
                    <div id="courseScheduleContainer" style="display: none;">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
    <script>
    var itemsArray = ['Operating Systems', 'Database Programming', 'Advanced Software Engineering', 'Compiler Design',
        'Electronic Commerce', 'Advanced Computer Architecture', 'Systems Programming', 'Application Development ',
        'Network Security ', 'Business Intelligence', 'Advanced Programming ',
        'Managing a Successful Computing Project',
        'Fundamentals of Computing', 'Security', 'Database Design & Development ', 'Networking',
        'Computer Systems Architecture', 'Data Analytics', 'Software Development Lifecycles',
        'Programming', 'Website Design And Development', 'Programming', 'Maths for Computing',
    ];

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

    function populateSelection() {
        var selectionDropdown = $('#courseSelect');

        selectionDropdown.empty();

        for (var i = 0; i < itemsArray.length; i++) {
            var option = $('<option>', {
                value: itemsArray[i],
                text: itemsArray[i],
                selected: true // Mark selected items
            });
            selectionDropdown.append(option);
        }
    }
    populateSelection();

    var selectedCourse;
    $('#courseSelect').change(function() {
        selectedCourse = $(this).find(':selected').text();
    });

    $('#showScheduleBtn').on('click', function() {
        $('#courseName').text(selectedCourse);

        if (selectedCourse) {
            $('#courseScheduleContainer').show();

            createTableRows(selectedCourse);
        } else {
            $('#courseScheduleContainer').hide();
        }
    });
    let chart = bb.generate({
        data: {
            columns: [
                ["Participated", 149],
                ["Did not participate", 80],
            ],
            type: "donut",
            onclick: function(d, i) {
                console.log("onclick", d, i);
            },
            onover: function(d, i) {
                console.log("onover", d, i);
            },
            onout: function(d, i) {
                console.log("onout", d, i);
            },
        },
        donut: {
            title: "Participation",
        },
        bindto: "#donut-chart",
    });
    </script>
</body>

</html>