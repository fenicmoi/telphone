<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/**
 * Generate a new CSRF token if one does not exist.
 * Can be forced to regenerate.
 */
function generate_csrf_token($force = false)
{
    if (empty($_SESSION['csrf_token']) || $force) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Output a hidden input field with the CSRF token.
 */
function csrf_field()
{
    $token = generate_csrf_token();
    echo '<input type="hidden" name="csrf_token" value="' . $token . '">';
}

/**
 * Verify if the submitted token matches the session token.
 * 
 * @param string $token The token submitted from the form.
 * @return void Dies with error message if invalid.
 */
function verify_csrf_token($token)
{
    if (empty($_SESSION['csrf_token']) || empty($token)) {
        http_response_code(403);
        die("CSRF Token Verification Failed: Token missing.");
    }

    if (!hash_equals($_SESSION['csrf_token'], $token)) {
        http_response_code(403);
        die("CSRF Token Verification Failed: Token mismatch.");
    }
}
?>