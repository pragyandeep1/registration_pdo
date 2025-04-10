<?php
require_once 'db/conn.php';
require_once 'includes/header.php';
// Get all attendees
// $results = $crud->getAttendees();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Inserting Student Data</h3>
                    <a href="index.php" class="btn btn-danger">Back</a>
                </div>
                <div class="card-body">
                    <form action="process.php" method="POST">
                        <div class="mb-3">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Full Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" required>
                        </div>
                        <div class="mb-3">
                            <label for="address">Course</label>
                            <input type="text" class="form-control" id="course" name="course" placeholder="Enter Course" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" name="save_student_btn" type="submit">Save Student</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'includes/footer.php';
?>