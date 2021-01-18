<?php
<<<<<<< HEAD
=======

>>>>>>> 2b52f9c90ca654d322da0bde409f7e84fd812b35
$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Subject = $_POST['Subject'];
    $Comment = $_POST['Comment'];

    if (empty($Name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($Email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($Subject)) {
        $errors[] = 'Subject is empty';
    }
    if (empty($Comment)) {
      $errors[] = 'Comment is empty';
  }


    if (empty($errors)) {
        $toEmail = 'contact@aaingenierie.fr';
        $emailSubject = $Subject;
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$name}", "Email: {$Email}", "Message:", $Comment];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: thank-you.html');
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}

?>