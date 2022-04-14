<?php

include 'header.php';

$selectappointment = $mysqli->prepare("select * from appointment a JOIN vehicle v JOIN model_master m JOIN user u where a.vehicle_id=v.vehicle_id and v.model_id=m.model_id and a.user_id=u.user_id ORDER BY a.appointment_status,a.appointment_schedule");
$selectappointment->execute();
$selectresult = $selectappointment->get_result();

?>

<div class="page">
    <div class="page-main">

        <!--sidebar open-->
        <?php include 'sidebar.php'; ?>
        <!--sidebar closed-->

        <div class="app-content main-content">
            <div class="side-app">

                <!--app header-->
                <?php include 'pageheader.php'; ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Appointment</h2>
                                    <h5><a href="<?=$root; ?>/addappointment.php" style="color:blue;">ADD
                                            Appointment</a></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap" id="example1">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">User Name</th>
                                                <th class="wd-20p border-bottom-0">Vehicle id</th>
                                                <th class="wd-20p border-bottom-0">Model Name</th>
                                                <th class="wd-25p border-bottom-0">Appointment Schedule</th>
                                                <th class="wd-15p border-bottom-0">Appointment Status</th>
                                                <th class="wd-15p border-bottom-0">Comments</th>
                                                <th class="wd-15p border-bottom-0">Take Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $selectresult->fetch_assoc()): ?>
                                            <tr>
                                                <td><?=$row['username']; ?></td>
                                                <td><?=$row['vehicle_id']; ?></td>
                                                <td><?=$row['model_name']; ?></td>
                                                <td><?=$row['appointment_schedule']; ?></td>
                                                <td>
                                                    <?php if ("Upcoming" == $row['appointment_status']): ?>
                                                    <h6 style='color:#307FCE'>Upcoming</h6>
                                                    <?php elseif ("Completed" == $row['appointment_status']): ?>
                                                    <h6 style='color:#317B31'>Completed</h6>
                                                    <?php elseif ("Requested" == $row['appointment_status']): ?>
                                                    <h6 style='color:#D29C36'>Requested</h6>
                                                    <?php else: ?>
                                                    <h6 style='color:#D12D2D'>Cancelled</h6>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?=$row['appointment_comments']; ?></td>
                                                <td>
                                                    <?php if (in_array($row['appointment_status'], ['Requested', 'Upcoming'])): ?>
                                                    <select id="action" name="action"
                                                        onchange="change_appointment(this.value, <?=$row['appointment_id']; ?>);">
                                                        <option value=""> --Action-- </option>
                                                        <?php if ('Requested' == $row['appointment_status']): ?>
                                                        <option value="accept">Accept</option>
                                                        <?php elseif ('Upcoming' == $row['appointment_status']): ?>
                                                        <option value="finished">Completed</option>
                                                        <?php endif; ?>
                                                        <option value="reschedule">Rechedule</option>
                                                        <option value="reject">Reject</option>
                                                    </select>
                                                    <?php elseif ('Cancelled' == $row['appointment_status']): ?>
                                                    <select id="action" name="action"
                                                        onchange="change_appointment(this.value, <?=$row['appointment_id']; ?>);">
                                                        <option value=""> --Action-- </option>
                                                        <option value="reschedule">Rechedule</option>
                                                    </select>
                                                    <?php else: ?>
                                                    <select disabled>
                                                        <option value=""> --Action-- </option>
                                                    </select>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
    function change_appointment(value, id) {
        var path = "appoint-" + value + ".php?id=" + id;
        window.location = path;
    }
    </script>
</div>