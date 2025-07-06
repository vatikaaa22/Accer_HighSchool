<?php
include '../../../helper/connection.php';

$eventId = $_GET['id'];

$sql = "SELECT * FROM events WHERE event_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $eventId);
$stmt->execute();
$result = $stmt->get_result();

if ($data = $result->fetch_assoc()) {
    ?>
    <span class="grid gap-2 mt-5">
        <div class="flex flex-col order-2">
            <label for="title" class="text-lg font-semibold text-black">Event Name</label>
            <input type="text" name="title" id="title" class="input input-bordered bg-white" placeholder="Enter Information Title" value="<?php echo htmlspecialchars($data['name']); ?>" />
        </div>
        <div class="flex flex-col">
                <label for="date" class="text-lg font-semibold text-black">Date</label>
                <input type="date" name="event_date" id="date" class="input input-bordered bg-white" placeholder="Enter event date" value="<?php echo htmlspecialchars($data['event_date'] ?? ''); ?>" />
        </div>
    </span>
    <?php
} else {
    echo "<p>No Event found.</p>";
}
$stmt->close();
?>