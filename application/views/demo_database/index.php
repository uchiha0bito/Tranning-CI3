<!-- Hiển thị dữ liệu từ cơ sở dữ liệu mặc định -->

<div class="container mt-5">
<h2>Data Table Products from Default DB</h2>
<table id="defaultTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Order Details</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_from_default_db as $row) { ?>
            <tr>
                <td><?php echo $row->product_id; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->description; ?></td>
                <td><?php echo $row->quantity; ?></td>
                <td><?php echo $row->price; ?></td>
                <td><?php echo $row->other_details; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<h2>Data from Table Products from Second DB</h2>
<table id="secondTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_from_second_db as $row) { ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->name; ?></td>
				<td><?php echo $row->price; ?></td>
                <td><?php echo $row->description; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</div>


