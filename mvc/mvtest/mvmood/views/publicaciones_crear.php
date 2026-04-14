<?php
session_start();
$title = 'Create Post - MVM Mood';
require_once "../models/ACL.php";
include 'header.php';


$saved = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = trim($_POST['content'] ?? '');
    if ($content !== '') {
        $_SESSION['posts'][] = $content;
        $saved = true;
    }
}
?>
<head>
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>



 
        <div class="main">
            <div class="create-post">
                <h2>Create a New Post</h2>
                <?php if ($saved): ?>
                    <div class="notice">Post created successfully.</div>
                <?php endif; ?>

                <form id="postForm" method="post" action="">
                    <textarea id="postContent" name="content" placeholder="What's on your mind? Share your thoughts, feelings, or updates..." required></textarea>
                    <button type="submit">Post</button>
                </form>
                <div class="post-preview" id="preview">
                    <h4>Your Post Preview</h4>
                    <p id="previewText"></p>
                </div>
            </div>

            <script>
                const textarea = document.getElementById('postContent');
                const preview = document.getElementById('preview');
                const previewText = document.getElementById('previewText');

                
                textarea.addEventListener('input', function() {
                    const content = textarea.value.trim();
                    if (content) {
                        previewText.textContent = content;
                        preview.style.display = 'block';
                    } else {
                        preview.style.display = 'none';
                        previewText.textContent = '';
                    }
                });
            </script>
        </div>
    </div>

</body>
</html>
