<?php
if ($user == 'Secretary' && $user_id_login != $id) {
    header("location: index.php?page=user");
}
?>
<h3>Registration</h3>
<p>Complete the form below and press the save button!</p>
<div id="form-block">
    <form method="POST" action="processes/process.user.php?action=new" onsubmit="return validateForm()">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" value="<?php echo htmlspecialchars($user->get_user_firstname($id)); ?>" placeholder="Your name.." required>

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name.." required>

            <label for="access">Access Level</label>
            <select id="access" name="access" required>
                <option value="" disabled selected>Select access level</option>
                <option value="secretary">Secretary</option>
                <option value="admin">Admin</option>
                <option value="super_admin">Super Admin</option>
            </select>
        </div>
        <div id="form-block-half">
            <label for="username">Username</label>
            <input type="text" id="username" class="input" name="username" placeholder="Your username.." required>

            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password.." required>

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password.." required>
        </div>
        <div id="button-block">
            <input type="submit" value="Save">
        </div>
    </form>
    <p id="error-message" style="color: red; display: none;"></p> <!-- Error message area -->
</div>

<script>
function validateForm() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmpassword').value;
    const errorMessage = document.getElementById('error-message');

    if (password !== confirmPassword) {
        errorMessage.textContent = "Passwords do not match!";
        errorMessage.style.display = "block"; // Show error message
        return false; // Prevent form submission
    }

    errorMessage.style.display = "none"; // Hide error message if passwords match
    return true; // Allow form submission
}
</script>
