<?php
session_start();
require_once 'db/conn.php';
require_once 'includes/header.php';
// Get all attendees
// $results = $crud->getAttendees();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <?php if (isset($_SESSION['success'])):?>
                    <h4 class="alert alert-success"><?= $_SESSION['success'] ?></h4>
                <?php
                    unset($_SESSION['success']);
                    endif; 
                ?>
                <?php if (isset($_SESSION['error'])):?>
                    <h4 class="alert alert-danger"><?= $_SESSION['error'] ?></h4>
                <?php 
                    unset($_SESSION['error']);
                    endif;
                ?>
                
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>Dummy Attendance</h3>
                        <a href="student-add.php" class="btn btn-primary">Add Student</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Course</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $pdo->query("SELECT * FROM students");
                            $stmt->execute();
                            $stmt->setFetchMode(PDO::FETCH_OBJ);
                            $results = $stmt->fetchAll();
                            if ($results) {
                                foreach ($results as $r): ?>
                                    <tr>
                                        <td><?= $r->id; ?></td>
                                        <td><?= $r->fullname; ?></td>
                                        <td><?= $r->email; ?></td>
                                        <td><?= $r->phone; ?></td>
                                        <td><?= $r->course; ?></td>
                                        <td class="d-flex justify-content-between">
                                            <a href="student-edit.php?id=<?= $r->id; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                            <form action="process.php" method="POST">
                                                <button type="submit" name="delete_student_btn" value="<?= $r->id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                            </form>
                                        </td>     
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center">No records found</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'includes/footer.php';