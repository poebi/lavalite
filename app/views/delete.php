<?php
if (!isset($id) || !is_numeric($id)) {
    echo "Invalid user id.";
    exit;
}

$result = db()->table('paa_users')->where('id', $id)->delete();

if ($result > 0) {
    set_flash('success', 'User deleted successfully.');
    header("Location: " . url('users'));
    exit;
} else {
    set_flash('error', 'User not found or already deleted.');
    header("Location: " . url('users'));
    exit;
}
?>