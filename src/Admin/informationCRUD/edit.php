<?php
include '../../../helper/connection.php';

$informationId = $_GET['id'];

$sql = "SELECT * FROM informations WHERE information_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $informationId);
$stmt->execute();
$result = $stmt->get_result();

if ($data = $result->fetch_assoc()) {
    ?>
    <span class="grid gap-2 mt-5">
        <div class="h-40 w-full">
            <img src="./uploads/<?php echo htmlspecialchars($data['image']); ?>" class="h-full w-full object-cover" />
        </div>
        <input type="file" class="file-input file-input-bordered file-input-sm w-full border bg-white" />
        <div class="flex flex-col">
            <label for="title" class="text-lg font-semibold text-black">Information Title</label>
            <input type="text" name="title" id="title" class="input input-bordered bg-white" placeholder="Enter Information Title" value="<?php echo htmlspecialchars($data['title']); ?>" />
        </div>
        <div class="flex flex-col">
            <label for="location" class="text-lg font-semibold text-black">Location</label>
            <input type="text" name="location" id="location" class="input input-bordered bg-white" placeholder="Enter Information Location" value="<?php echo htmlspecialchars($data['location']); ?>" />
        </div>
        <div class="flex flex-col">
            <label for="content" class="text-lg font-semibold text-black">Content</label>
            <textarea name="content" id="content" class="input input-bordered bg-white h-40 py-1" placeholder="Enter Content"><?php echo htmlspecialchars($data['description']); ?></textarea>
        </div>
    </span>
    <?php
} else {
    echo "<p>No information found.</p>";
}
$stmt->close();
?>