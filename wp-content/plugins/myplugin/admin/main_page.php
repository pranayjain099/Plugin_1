<?php
global $wpdb, $table_prefix;
$wp_emp = $table_prefix . 'emp';

$q = "SELECT * FROM `$wp_emp`";
$results = $wpdb->get_results($q);

ob_start();
?>
<div class="wrap">
    <table class="wp-list-table widefat fixed striped table-view-list pages">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($results as $row):
                ?>
                <tr>
                    <td>
                        <?php echo $row->ID; ?>
                    </td>
                    <td>
                        <?php echo $row->name; ?>
                    </td>
                    <td>
                        <?php echo $row->email; ?>
                    </td>
                    <td>
                        <?php echo $row->status; ?>
                    </td>
                </tr>
                <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>

<?php
echo ob_get_clean();
?>