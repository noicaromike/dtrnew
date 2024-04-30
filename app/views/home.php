<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/datatable.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <title>Doctor's Biometric</title>

</head>

<body>
    <div class="container">
        <div class="home-content">
            <div class="img-container">
                <img src="<?php echo URLROOT; ?>/public/img/EACMed Complete.png" alt="">
            </div>
            <h2>Doctors Biometric DTR Printing</h2>
            <span class="invalidFeedback"><?php echo $data['itemsError']; ?></span>
            <span class="invalidFeedback"><?php echo $data['startDateError']; ?></span>
            <span class="invalidFeedback"><?php echo $data['endDateError']; ?></span>

            <div class="table-container">
                <form action="" method="POST">
                    <div class="form-btns">

                        <div class="form-date">
                            <button type="submit" class="form__btn">Print preview</button>
                            <label class="date-label" for="">Start Date</label>
                            <input type="date" name="startDate" value="<?php echo $data['startDate'];?>" class="form__input">
                            <label class="date-label" for="">End Date</label>
                            <input type="date" name="endDate" value="<?php echo $data['endDate'];?>" class="form__input">
                        </div>
                        <div class="form-btn-container">

                            <a href="<?php echo URLROOT; ?>/employees/create" class="form__btn">Add Doctor</a>

                        </div>
                    </div>

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Employee Id</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data['doctors'] as $doc):?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="items[]" value="<?php echo $doc->USERID;?>" >
                                </td>
                                <td><?php echo $doc->BNo;?></td>
                                <td><?php echo $doc->EMPNAME;?></td>
                                <td><?php echo $doc->POSITION;?></td>
                                <td>
                                    <a href="<?php echo URLROOT . '/employees/edit/'. $doc->BNo;?>" class="green" >Edit</a>
                                    <a href="<?php echo URLROOT . '/employees/delete/'. $doc->BNo;?>" class="red" >Delete</a>
                                </td>
                                
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                        
                    
                </form>
            </div>


        </div>
    </div>

    
    <script src="<?php echo URLROOT; ?>/public/javascript/datatable.js"></script>
    <script src="<?php echo URLROOT; ?>/public/javascript/datatablecdn.js"></script>
    <script src="<?php echo URLROOT; ?>/public/javascript/script.js"></script>


</body>

</html>