<?php include('header.php');?>
<title>Schedule Preferences List</title>
</head>

<body>
    <?php include('layout/navigation.php'); ?>
    <div class="container">
        <div class="row flex-wrap min-vh-100">
            <div class="col py-3 mx-4">
                <div class="container mt-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div id="pageTopElements" class="d-flex align-items-center justify-content-between">
                            <h2 class="pageTitle">Course Preferences Table</h2>

                        </div>
                        <div class="input-group col-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search" aria-label="Username"
                                aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">Search</button>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped" id="coursePreferencesTable">
                        <thead>
                            <tr>
                                <th scope="col">Course Name</th>
                                <th scope="col">Number of Preferences</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <nav>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" style="color:#00303d;" href="">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" style="color:#00303d;" href="">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script>
    var coursePreferencesArray = [{
            courseName: 'Website Design And Development',
            preferences: 102
        },
        {
            courseName: 'Programming',
            preferences: 100
        },
        {
            courseName: 'Maths for Computing',
            preferences: 66
        },
        {
            courseName: 'Software Development Lifecycles',
            preferences: 32
        },
        {
            courseName: 'Data Analytics',
            preferences: 30
        },
        {
            courseName: 'Computer Systems Architecture',
            preferences: 19
        },
        {
            courseName: 'Networking',
            preferences: 100
        },
        {
            courseName: 'Database Design & Development ',
            preferences: 100
        },
        {
            courseName: 'Security',
            preferences: 87
        },
        {
            courseName: 'Fundamentals of Computing',
            preferences: 90
        },
        {
            courseName: 'Managing a Successful Computing Project',
            preferences: 44
        },
        {
            courseName: 'Advanced Programming ',
            preferences: 22
        },
        {
            courseName: 'Business Intelligence',
            preferences: 36
        },
        {
            courseName: ' Network Security ',
            preferences: 28
        },
        {
            courseName: 'Application Development ',
            preferences: 25
        },
        {
            courseName: 'Systems Programming',
            preferences: 55
        },
        {
            courseName: 'Advanced Computer Architecture',
            preferences: 100
        },
        {
            courseName: 'Electronic Commerce',
            preferences: 50
        },
        {
            courseName: 'Compiler Design',
            preferences: 45
        },
        {
            courseName: 'Advanced Software Engineering',
            preferences: 23
        },
        {
            courseName: 'Database Programming',
            preferences: 20
        },
        {
            courseName: 'Operating Systems',
            preferences: 40
        }
    ];

    function createTableRows() {
        var tableBody = $('#coursePreferencesTable tbody');

        tableBody.empty();

        // Sort array based on preferences in ascending order
        coursePreferencesArray.sort(function(a, b) {
            return b.preferences - a.preferences;
        });

        // Add table rows based on the sorted array
        for (var i = 0; i < coursePreferencesArray.length; i++) {
            var row = $('<tr>');
            row.append($('<td>', {
                text: coursePreferencesArray[i].courseName
            }));
            row.append($('<td>', {
                text: coursePreferencesArray[i].preferences
            }));

            // Add "Edit" button with a link to another page and passing the record information
            var editButton = $('<a>', {
                href: 'CourseSchedule.php?courseName=' + coursePreferencesArray[i]
                    .courseName +
                    '&preferences=' + coursePreferencesArray[i].preferences,
                class: 'link link-primary',
                text: 'section preferences',
            });

            row.append($('<td>').append(editButton));
            tableBody.append(row);
        }
    }

    // Call the function to create table rows
    createTableRows();
    </script>
    <?php include('footer.php'); ?>
</body>

</html>