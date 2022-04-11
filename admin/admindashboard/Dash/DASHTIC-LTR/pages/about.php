<?php include('header.php');?>

<?php

$change = 0;

if(isset($_POST['submit']))
{
    $new_content = $_POST['content'];
    $edit_query = 'UPDATE edit_content SET content_text = "'. $new_content.'" WHERE content_id = 1';

    $edit_result = mysqli_query($conn,$edit_query);
    if(mysqli_affected_rows($conn) != 0)
    {
        $change = 2;
    }

    else
    {
        $change = 1;
    }
}

$content_query = "SELECT * FROM edit_content WHERE content_id = 1";
$content_result = mysqli_query($conn, $content_query);
$content = mysqli_fetch_array($content_result)['content_text'];

?>

<div class="page">
	<div class="page-main">

		<!--sidebar open-->
		<?php include('sidebar.php');?>
		<!--sidebar closed-->

		<div class="app-content main-content">
			<div class="side-app">

				<!--app header-->
				<?php include('pageheader.php');?>
				<!--End Page header-->

                <div class="row">
                    <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                    <!-- <div class="col-12"> -->
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>About Us</h2>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="">
                                    <?php if($change == 2) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Holy guacamole!</strong> The content has been changed.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php elseif($change == 1) : ?>
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong>Holy guacamole!</strong> There were no changes made.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <?php endif; ?>
                                    <form method="POST" action="" id ="form">
                                    <div class="form-group">
                                        <label class="form-label">About Us Content</label>
                                        <textarea class="form-control" name="content" placeholder="Enter the content for About Us" rows="10" required><?php echo $content; ?></textarea>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary mt-4 mb-0">Change Content</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/div-->
                    </div>
                </div>
                <!-- /Row -->
            </div>
        </div>
        <!-- end app-content-->
    </div>
</div>
<?php include('footer.php') ?>