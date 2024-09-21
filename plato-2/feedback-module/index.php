<?php
$feedback = new Feedback();
$feedbackList = $feedback->get_all_feedback(); // Fetch all feedback
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Feedback</title>
    <link rel="stylesheet" href="styles.css">
    <script src="js/script.js" defer></script>
</head>
<body>
  <div class="container">
    <header>
        <h1>User Feedback</h1>
        <input type="text" id="search" placeholder="Search feedback..." onkeyup="filterFeedback()">
    </header>
    <div class="feedback">
        <?php if (!empty($feedbackList)): ?>
            <table id="feedback-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Timestamp</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($feedbackList as $feedbackItem): ?>
                        <tr class="feedback-item">
                            <td><?php echo htmlspecialchars($feedbackItem['user_firstname'] . ' ' . $feedbackItem['user_lastname']); ?></td>
                            <td><?php echo htmlspecialchars($feedbackItem['timestamp']); ?></td>
                            <td><?php echo nl2br(htmlspecialchars($feedbackItem['feedback'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-feedback">No feedback available.</div>
        <?php endif; ?>
    </div>
</div>

    <div id="subcontent">
        <?php
        // Handle different actions based on the query string
        switch ($action) {
            case 'view':
                require_once 'feedback-module/admin-feedback.php'; // Page to view user profile
                break;
            default:
                require_once 'main.php'; // This should be the file that lists all users
                break;
        }
        ?>
    </div>
</body>
</html>

