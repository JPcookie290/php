<?php
declare( strict_types=1 );
include 'functions.php';

$profil = [
    'gender' => [],
    'firstname' => '',
    'lastname' => '',
    'age' => '',
    'email' => '',
    'phone' => '',
    'street' => '',
    'postcode' => '',
    'city' => '',
    'county' => '',
    'image' => '',
];

$errors = [
    'gender' => '',
    'firstname' => '',
    'lastname' => '',
    'age' => '',
    'email' => '',
    'phone' => '',
    'street' => '',
    'postcode' => '',
    'city' => '',
    'county' => '',
    'image' => '',
];
$max_file_size = 1024 * 1024 * 4; 
$upload_dir = __DIR__ . '/uploads';
$allowed_types = [ 'image/jpeg', 'image/png' ];
$allowed_extensions = [ 'jpg', 'jpeg', 'png'];

if ( $_SERVER['REQUEST_METHOD' ] === 'POST' ) {
    $errors['gender'] = ''; //TODO:
    $errors['firstname'] = check_string($profil['firstname']) ? '' : 'Please input your first name';
    $errors['lastname'] = check_string($profil['lastname']) ? '' : 'Please input your last name';
    $errors['age'] = check_string($profil['age']) ? '' : "Please input your age as a number, you'll have to be over the age of 12";
    $errors['email'] = ''; //TODO:
    $errors['phone'] = ''; //TODO:
    $errors['street'] = check_string($profil['street']) ? '' : 'Please input your street name and number'; //TODO: create an check_street to validate
    $errors['postcode'] = check_string($profil['postcode']) ? '' : 'Please input your postcode';
    $errors['city'] = check_string($profil['city']) ? '' : 'Please input your city';
    $errors['country'] = check_string($profil['country']) ? '' : 'Please input your country';
    $errors['image'] = ''; //TODO:
    
}


?>
<main style="padding-top: 2rem">
    <h3>Input Personal Data</h3>
    <form action="form.php" method="post">
        <label for="gender">Gender
            <input type="checkbox" name="male" id="male" value="male">
            <input type="checkbox" name="female" id="female" value="female">
            <input type="checkbox" name="divers" id="divers" value="divers">
            <span style="color: red">><?= $errors['gender']; ?></span>
        </label>
        <label for="firstname">
            <input type="text" name="firstname" id="firstname" placeholder="First Name" value="<?= e( (string) $profil['firstname'] )?>">
            <span style="color: red"><?= $errors['firstname']; ?></span>
        </label>
        <label for="lastname">
            <input type="text" name="lastname" id="lastname" placeholder="Last Name" value="<?= e( (string) $profil['lastname'] )?>">
            <span style="color: red">><?= $errors['lastname']; ?></span>
        </label>
        <label for="age">
            <input type="text" name="age" id="age" placeholder="Age" value="<?= e( (string) $profil['age'] )?>">
            <span style="color: red">><?= $errors['age']; ?></span>
        </label>
        <label for="email">
            <input type="email" name="email" id="email" placeholder="E-Mail" value="<?= e( (string) $profil['email'] )?>">
            <span style="color: red">><?= $errors['email']; ?></span>
        </label>
        <label for="phone">
            <input type="text" name="phone" id="phone" placeholder="Phone Number" value="<?= e( (string) $profil['phone'] )?>">
            <span style="color: red">><?= $errors['phone']; ?></span>
        </label>
        <label for="street">
            <input type="text" name="street" id="street" placeholder="Street" value="<?= e( (string) $profil['street'] )?>">
            <span style="color: red">><?= $errors['street']; ?></span>
        </label>
        <label for="postcode">
            <input type="text" name="postcode" id="postcode" placeholder="Postcode" value="<?= e( (string) $profil['postcode'] )?>">
            <span style="color: red">><?= $errors['postcode']; ?></span>
        </label>
        <label for="city">
            <input type="text" name="city" id="city" placeholder="City" value="<?= e( (string) $profil['city'] )?>">
            <span style="color: red">><?= $errors['city']; ?></span>
        </label>
        <label for="country">
            <input type="text" name="country" id="country" placeholder="Country" value="<?= e( (string) $profil['country'] )?>">
            <span style="color: red">><?= $errors['country']; ?></span>
        </label>
        <label for="image">Upload Profile Picture:
            <input type="file" name="image" id="image" accept="image/*">
            <span style="color: red">><?= $errors['image']; ?></span>
        </label>
        <input type="submit" value="Save">
    </form>
</main>