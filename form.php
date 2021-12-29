<?php

$errors = [];

    if(!empty($_POST)) {

        $name = $_POST['username'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // echo "form submitted"; 
    
        if (empty($name)) {
            $errors[] = 'Name is empty';
        }

        if(empty($number)) {
            $errors[] = 'Number is empty';
        }
     
        if (empty($email)) {
            $errors[] = 'Email is empty';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email is invalid';
        }
     
        if (empty($message)) {
            $errors[] = 'Message is empty';
        } 

    

    if (empty($errors)) {
        $toEmail = 'muhammadatik143@gmail.com';
        $emailSubject = 'New email from your contant form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$name}","Number: {$number}" , "Email: {$email}", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: /');
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
} else {
    echo "formm not submitted";
}

?>
