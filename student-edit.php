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
                    <h3>Updating Student Data</h3>
                    <a href="index.php" class="btn btn-danger">Back</a>
                </div>
                <div class="card-body">
                    <?php 
                        if (isset($_GET['id'])){
                            $student_id = $_GET['id'];
                            $query = "SELECT * FROM students WHERE id = :stud_id";
                            $stmt = $pdo->prepare($query);
                            $data = [':stud_id' => $student_id];
                            $stmt->execute($data);
                            $result = $stmt->fetch(PDO::FETCH_OBJ);
                        }
                    ?>
                    <form action="process.php" method="POST">
                        <input type="hidden" name="id" value="<?= $result->id ?>">
                        <div class="mb-3">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" value="<?= $result->fullname ?>" name="fullname" placeholder="Enter Full Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" value="<?= $result->email ?>" name="email" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" value="<?= $result->phone ?>" name="phone" placeholder="Enter Phone Number" required>
                        </div>
                        <div class="mb-3">
                            <label for="address">Course</label>
                            <input type="text" class="form-control" value="<?= $result->course ?>" name="course" placeholder="Enter Course" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" name="update_student_btn" type="submit">Update Student</button>    
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