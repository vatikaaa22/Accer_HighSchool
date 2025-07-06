<?php
include '../../../helper/connection.php';

$informationId = $_GET['id'];

$sql = "SELECT * FROM facilities WHERE facility_id = ?";
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
        <input type="file" name="image" class="file-input file-input-bordered file-input-sm w-full border bg-white" required/>
        <div class="flex flex-col">
            <label for="name" class="text-lg font-semibold text-black">Name</label>
            <input type="text" name="name" id="name" class="input input-bordered bg-white" placeholder="Enter Information name" value="<?php echo htmlspecialchars($data['name']);?>"/>
        </div>
        <div class="flex flex-col">
            <label for="description" class="text-lg font-semibold text-black">Description</label>
            <textarea name="description" id="description" class="input input-bordered bg-white h-40 py-1" placeholder="Enter description"><?php echo htmlspecialchars($data['description']);?></textarea>
        </div>
    </span>
    <?php
} else {
    echo "<p>No information found.</p>";
}
$stmt->close();
?>
