<h3><strong>Here is feedback about us:</strong></h3>

<?php if (!\app\core\Session::isUserLoggedIn()) : ?>
    <h3>Wanna leave a feedback? go <a href="/login">Login</a></h3>
<?php else : ?>
    <form class="form-group" action="" method="post">
        <textarea class="form-group" name="comment" id="comment" cols="80" rows="3"></textarea>
        <button class="btn btn-primary btn-block" >Submit</button>
    </form>
<?php endif; ?>