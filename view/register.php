<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class=" card-body  mt-3">
            <?php //flash('register_fail'); 
            ?>
            <div class="d-flex a-center justify-content-between ">
                <div>
                    <h2>Registration</h2>
                </div>
                <div>
                    <a class="back" href="/">
                        <img src="../../public/images/back.png" alt="">
                    </a>
                </div>

            </div>

            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name:<sup>*</sup></label>
                    <input type="text" name="name" id="name" class="<?php echo (!empty($errors['nameErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $name ?>">
                    <span class='invalid-feedback'><?php echo $errors['nameErr'] ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Surname:<sup>*</sup></label>
                    <input type="text" name="surname" id="surname" class="<?php echo (!empty($errors['surnameErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $surname ?>">
                    <span class='invalid-feedback'><?php echo $errors['surnameErr'] ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email:<sup>*</sup></label>
                    <input type="text" name="email" id="email" class="<?php echo (!empty($errors['emailErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $email ?>">
                    <span class='invalid-feedback'><?php echo $errors['emailErr'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password:<sup>*</sup></label>
                    <input type="password" name="password" id="password" class="<?php echo (!empty($errors['passwordErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $password ?>">
                    <span class='invalid-feedback'><?php echo $errors['passwordErr'] ?></span>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password:<sup>*</sup></label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="<?php echo (!empty($errors['confirmPasswordErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $confirmPassword ?>">
                    <span class='invalid-feedback'><?php echo $errors['confirmPasswordErr'] ?></span>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+370</div>
                        </div>
                        <input type="text" name="phone" id="phone" class="<?php echo (!empty($errors['phoneErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $phone ?>">
                        <span class='invalid-feedback'><?php echo $errors['phoneErr'] ?></span>
                    </div>

                </div>
                <div class="form-group">
                    <label for="email">Address:</label>
                    <input type="text" name="address" id="address" class="<?php echo (!empty($errors['addressErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $address ?>">
                    <span class='invalid-feedback'><?php echo $errors['addressErr'] ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-primary btn-block">
                    </div>
                    <div class="col">
                        <a href="/login" class='btn btn-light btn-block '>Have an account? Login</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>