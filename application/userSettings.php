<?php
require_once "authenticateUser.php";
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8"/>

  <title>User Settings</title>

  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <script  src="//code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>

  <script src="js/conferenceAPIJs/databaseFunctions.js"></script>
  <script src="js/userJs/userSettings.js"></script>
  <script src="js/userJs/userAccountRegistration.js"></script>
</head>

<body>
<header>
  <h1>User Settings</h1>
</header>

<main>
  <form id="userSettingsForm" method="put" method="put">
    <legend>Change User Information</legend>
    <label for="user_name">User Name</label>
    <input type="text" id="user_name" class="userSettings" name="user_name" data-value="<?php ECHO $_SESSION["user_name"]; ?>" required="required" />
    <label for="user_email">User Email</label>
    <input type="email" id="user_email" class="userSettings" name="user_email" data-value="<?php ECHO $_SESSION["user_email"]; ?>" required="required" />

    <fieldset>
    <legend>Conference Event Notification Settings</legend>
    <input type="checkbox" id="user_notifyByEmail" class="userSettings" name="user_notifyByEmail" data-value="<?php echo $_SESSION['user_notifyByEmail']; ?>" />
    <label for="user_notifyByEmail">Notify me by email:</label>
    <input type="checkbox" id="user_notifyByPhone" class="userSettings" name="user_notifyByPhone" data-value="<?php echo $_SESSION['user_notifyByPhone']; ?>" />
    <label for="user_notifyByPhone">Notify me by text message</label>
    </fieldset>

    <fieldset id="phoneRegion" style="display: none;">
      <label for="user_phone">Phone:</label>
      <input type="phone" id="user_phone" class="userSettings" name="user_phone" data-value="<?php echo $_SESSION['user_phone']; ?>" />
      <p>Plese choose your carrier from the list. This is necessary to send you text notifications. We support only a small number of carriers,
      so we appoligize for any inconvenience.</ br><br>
      <label for="user_phoneCarrier">Carrier:</label>
      <select id="user_phoneCarrier" class="userSettings" name="user_phoneCarrier" data-value="<?php echo $_SESSION['user_phoneCarrier']; ?>">
        <option value=""></option>
        <option value="verizon">verizon</option>
        <option value="metro pcs">metro pcs</option>
        <option value="nextel">nextel</option>
        <option value="sprint">sprint</option>
        <option value="t-mobile">t-mobile</option>
        <option value="u.s. cellular">u.s. cellular</option>
        <option value="at&t">at&t</option>
        <option value="virgin mobile">at&t</option>
        <option value="tracfone">tracfone</option>
        <option value="ting">ting</option>
        <option value="boost mobil">boost mobil</option>
      </select></p>
      <!--Message for only screenreaders. read when region is shown, shouldn't be visually visible.-->
      <div id="screenreaderPhoneRegionMessage" class="screenreader-text" role="alert">Phone Information expanded below</div>
    </fieldset>

    <input type="submit" id="updateUserDataButton" value="Change" />
  </form>
</main>

</body>
</html>