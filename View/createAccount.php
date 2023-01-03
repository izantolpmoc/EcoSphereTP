<?php if(isset($error)) : ?>
    <div class="alert alert-danger text-center" role="alert">
        <?= $error?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>


<div class="wrapper-50 margin-auto center">
    <h2>Create an account</h2>
    <form class="form" action="index.php?ctrl=user&action=doCreate" method="POST">
        <input type="email" name="email"placeholder="Mail" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required/><br>
        <input type="password" name="password"placeholder="Password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" required/><br>
        <input type="text" name="lastName"placeholder="Last Name" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" required/><br>
        <input type="text" name="firstName"placeholder="First Name" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>" required/><br>
        <input type="text" name="address"placeholder="Address" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" required/><br>
        <input type="text" name="postalCode"placeholder="Postal Code" value="<?= isset($_POST['postalCode']) ? $_POST['postalCode'] : '' ?>" required/><br>
        <input type="text" name="city"placeholder="City" value="<?= isset($_POST['city']) ? $_POST['city'] : '' ?>" required/><br>
        <p>
            <input type="submit" class="submit-btn" value="Create">
        </p>
    </form>
    <span></span>
</div>