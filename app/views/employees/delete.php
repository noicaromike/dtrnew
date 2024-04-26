<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>


    <div class="employees-container">
        <div class="emp-content">
            <div class="system-logo">
                <img src="<?php echo URLROOT; ?>/public/img/EACMed Complete.png" alt="">
            </div>
            <h2>Doctors Biometric DTR Printing</h2>
            <span class="green" id="message">
                <?php echo $data['message']; ?>
            </span>
            <form action="" method="POST">
                <div class="card">
                    <h3>Are you sure you want to delete this Employee?</h3>
                    <div class="form__item">
                        <label for="" class="form__label">Biometric no.</label>
                        <input disabled type="text" value="<?php echo $data['BNo']; ?>" name="BNo" class="form__input" placeholder="Enter new biometric no.">
                        <span class="invalidFeedback"><?php echo $data['BNoError']; ?></span>
                    </div>
                    <div class="form__item">
                        <label for="" class="form__label">Name</label>
                        <input disabled type="text" value="<?php echo $data['EMPNAME']; ?>" name="EMPNAME" class="form__input" placeholder="Enter the full name">
                        <span class="invalidFeedback"><?php echo $data['EMPNAMEError']; ?></span>
                    </div>
                    <div class="form__item">
                        <label for="" class="form__label">Position</label>
                        <input disabled type="text" value="<?php echo $data['POSITION']; ?>" name="POSITION" class="form__input" placeholder="Enter a position">
                        <span class="invalidFeedback"><?php echo $data['POSITIONError']; ?></span>
                    </div>
                    <div class="form__item">
                        <button class="form__btn bgred">Delete</button>
                    </div>

                    <div class="form__item">
                        <a href="<?php echo URLROOT; ?>/home" class="form__btn back">Back</a>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <script src="<?php echo URLROOT; ?>/public/javascript/javascript.js"></script>
</body>

</html>