<form method="post" action="save.php">

    <input name="first name" />

    <button>Save</button>

</form>

save.php

<?php

echo $_POST['first_name'];

?>