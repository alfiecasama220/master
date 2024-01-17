<?php

    require_once($_SERVER['DOCUMENT_ROOT'] . "\connection.php");
    session_start();

    if(isset($_POST['submit'])) {
        $role = $_POST['selectRole'];
        $title = htmlspecialchars($_POST['title']);
        $reportMessage = htmlspecialchars($_POST['reportMessage']);
        $status = htmlspecialchars($_POST['status']);
        $database = mysqli_query($connection, "INSERT INTO reports(Title, Description, Status,Role) values('$title', '$reportMessage', '$status', '$role')");
        if($database) {
            $self = $_SERVER['PHP_SELF'];
            header("Location: $self");
        }
    }
?>


<!DOCTYPE html>
<html lang="zxx" class="js">

<!-- head -->
<?php require_once("../head.php") ?>

<body class="nk-body ui-rounder npc-default has-sidebar ">
    <form method="POST">
    <div class="nk-app-root">
        <div class="nk-sidebar" data-content="sidebarMenu">
            <!-- sidebar -->
            <?php require_once("../sidebar.php") ?>
            <!-- nk-sidebar -->
            <?php require_once("../nk-sidebar.php") ?>
            </div>
        </div>
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require_once("../main-header.php") ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Create Report</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You can add a report by fil these field.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="row gy-4">
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="name">Report Title</label>
                                                        <input type="text" class="form-control" name="title" id="name" placeholder="Report Name" required>
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-xxl-3 col-md-12 col-xl-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="name">Report Message</label>
                                                        <textarea class="form-control no-resize" name="reportMessage" id="default-textarea">Large text area content</textarea>
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Status</label>
                                                        <div class="form-control-wrap">
                                                            <select name="status" class="form-select js-select2">
                                                                <option value="default_option">select</option>
                                                                <option value="1">Active</option>
                                                                <option value="0">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group"><label class="form-label">Send to</label><div class="form-control-wrap"><select class="form-select js-select2 select2-hidden-accessible" name="selectRole" data-search="on" data-select2-id="6" tabindex="-1" aria-hidden="true"><option value="admin" data-select2-id="8">Admin</option><option value="manager" data-select2-id="19">Manager</option><option value="staff" data-select2-id="20">Staff</option></select><span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" data-select2-id="7" style="width: 578px;"><span class="selection"></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div></div>
                                                </div><!--col-->
                                                

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <button name="submit" class="btn btn-primary">Add Report</button>
                                                    </div>
                                                </div><!--col-->
                                            </div><!--row-->
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    </form>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=3.1.3"></script>
    <script src="./assets/js/scripts.js?ver=3.1.3"></script>
    <link rel="stylesheet" href="./assets/css/editors/quill.css?ver=3.1.3">
    <script src="./assets/js/libs/editors/quill.js?ver=3.1.3"></script>
    <script src="./assets/js/editors.js?ver=3.1.3"></script>
</body>

</html>