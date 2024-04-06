<?php
require_once 'functions.php';
require_once 'classes/Location.php';
require_once 'classes/LocationTableGateway.php';
require_once 'classes/Connection.php';

$connection = Connection::getInstance();
$gateway = new LocationTableGateway($connection);

$locations = $gateway->getLocations();

if (!isset($formdata)) {
    $formdata = array();
}

if (!isset($errors)) {
    $errors = array();
}

// Set default cost based on the dropdown selection
$selectedCost = isset($formdata['CostType']) ? $formdata['CostType'] : 'budget';
$costs = [
    'budget' => 100000,
    'premium' => 500000,
    'luxury' => 1000000
];
$selectedCostValue = isset($costs[$selectedCost]) ? $costs[$selectedCost] : $costs['budget'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Event Form</title>
    <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
    <?php require 'utils/scripts.php'; ?><!--js links. file found in utils folder-->
</head>
<body>
<?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
<div class="content">
    <div class="container">
        <h1>Create Event Form</h1><!--form title-->
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form action="createEvent.php" method="POST" class="form-horizontal">
            <div class="form-group">
                <label for="Title" class="col-md-2 control-label">Title</label><!--event title-->
                <div class="col-md-5">
                    <input type="text" class="form-control" id="Title" name="Title" value="<?php echoValue($formdata, "Title") ?>" /><!--input-->
                </div>
                <div class="col-md-4">
                    <span id="TitleError" class="error"><!--error message for invalid input-->
                        <?php echoValue($errors, 'Title'); ?>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="Description" class="col-md-2 control-label">Description</label><!--event description-->
                <div class="col-md-5">
                    <input type="text" class="form-control" id="Description" name="Description" value="<?php echoValue($formdata, "Description") ?>" /><!--input-->
                </div>
                <div class="col-md-4">
                    <span id="DescriptionError" class="error"><!--error message for invalid input-->
                        <?php echoValue($errors, 'Description'); ?>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="StartDate" class="col-md-2 control-label">Start Date</label><!--start date-->
                <div class="col-md-5">
                    <input type="date" class="form-control" id="StartDate" name="StartDate" value="<?php echoValue($formdata, "StartDate") ?>" /><!--input-->
                </div>
                <div class="col-md-4">
                    <span id="StartDateError" class="error"><!--error message for invalid input-->
                        <?php echoValue($errors, 'StartDate'); ?>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="EndDate" class="col-md-2 control-label">End Date</label><!--end date-->
                <div class="col-md-5">
                    <input type="date" class="form-control" id="EndDate" name="EndDate" value="<?php echoValue($formdata, "EndDate") ?>" /><!--input-->
                </div>
                <div class="col-md-4">
                    <span id="EndDateError" class="error"><!--error message for invalid input-->
                        <?php echoValue($errors, 'EndDate'); ?>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="CostType" class="col-md-2 control-label">Cost Type</label><!--cost type-->
                <div class="col-md-5">
                    <select name="CostType" id="CostType" class="form-control" onchange="updateCost()">
                        <option value="budget" <?php echo $selectedCost === 'budget' ? 'selected' : '' ?>>Budget</option>
                        <option value="premium" <?php echo $selectedCost === 'premium' ? 'selected' : '' ?>>Premium</option>
                        <option value="luxury" <?php echo $selectedCost === 'luxury' ? 'selected' : '' ?>>Luxury</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <span id="CostTypeError" class="error"><!--error message for invalid input-->
                        <?php echoValue($errors, 'CostType'); ?>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="Cost" class="col-md-2 control-label">Cost</label><!--cost-->
                <div class="col-md-5">
                    <input type="text" class="form-control" id="Cost" name="Cost" value="<?php echo $selectedCostValue ?>" readonly />
                </div>
                <div class="col-md-4">
                    <span id="CostError" class="error"><!--error message for invalid input-->
                        <?php echoValue($errors, 'Cost'); ?>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="LocID" class="col-md-2 control-label">Location ID</label><!--location id-->
                <div class="col-md-5">
                    <select name="LocID"
                            id="LocID"
                            class="form-control"
                    >
                        <?php
                        foreach ($locations as $location) {
                            echo '<option value="' . $location['LocationID'] . '">' . $location['Name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <span id="LocIDError" class="error"><!--error message for invalid input-->
                        <?php echoValue($errors, 'LocID'); ?>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-default pull-right">Create Event <span class="glyphicon glyphicon-send"></span></button>
            <a class="btn btn-default navbar-btn" href="viewEvents.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a><!--register button-->
        </form>
    </div>
</div>
<?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->

<script>
    // JavaScript function to update the cost based on the selected cost type
    function updateCost() {
        var costType = document.getElementById('CostType').value;
        var costs = {
            'budget': 100000,
            'premium': 500000,
            'luxury': 1000000
        };
        document.getElementById('Cost').value = costs[costType];
    }
</script>

</body>
</html>
