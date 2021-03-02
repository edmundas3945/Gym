<h3 class="feedbackTitle mt-3 mb-3"><strong>Here is feedback about us:</strong></h3>

<table style="width:100%" class="comments">
  <tr>
    <th style="width:150px">User Name</th>
    <th style="width:auto">Comment</th>
  </tr>
  <?php foreach ($comments as $item) :?>
  <tr>
    <td><?php echo $item->name ?></td>
    <td><?php echo $item->comment ?></td>
  </tr>
  <?php endforeach ?>
</table>

<div class="comments"></div>

<?php if (!\app\core\Session::isUserLoggedIn()) : ?>
    <h3 class="mt-5 mb-5">Wanna leave a feedback? go <a href="/login">Login</a></h3>
<?php else : ?>
    <form class="form-group mt-3" action="" id="commentForm" method="post">
        <textarea class="mb-0 <?php echo (!empty($commentErr)) ? 'is-invalid' : ''; ?> form-control form-group form-control-lg" name="comment" id="comment" cols="80" rows="3"></textarea>
        <span class='invalid-feedback'><?php echo $commentErr ?></span>
        <input type="submit" value="Submit" class="btn mt-3 btn-primary btn-block">
</form>
<?php endif; ?>

<script>
  const commentsOutput = document.getElementById('comments')
  fetchComments()
  function fetchComments(){
    fetch('http://localhost/gym/feedbackJS')
    .then(res => res.json())
    .then(data => {
      console.log(data)
    })
  }

</script>


