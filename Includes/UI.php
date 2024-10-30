<?php 

/*
 * Visual Output of plugin "Host Info"
 *	Created by Olivier Willems 
 *	@ http://willemso.com/
 *	Please do not copy code without credits..
 */
//echo "Server Uptime: <b>".uptime()."</b>";
?>

<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <span class="description"><?php esc_html_e( "Realtime server and execution environment information, your Wordpress host details:", "Host-Info" ); ?></span>

<br>
<br>
<pre>
<b><?php esc_html_e( "Uptime", "Host-Info" ); ?>:</b> 
<?php echo HI_uptime(); ?>



<b><?php esc_html_e( "System Information", "Host-Info" ); ?>:</b>
<?php system("uname -a"); ?>


<b><?php esc_html_e( "Memory Usage (MB)", "Host-Info" ); ?>:</b> 
<?php system("free -m"); ?>


<b><?php esc_html_e( "Disk Usage", "Host-Info" ); ?>:</b> 
<?php system("df -h"); ?>


<b><?php esc_html_e( "CPU Information", "Host-Info" ); ?>:</b> 
<?php system("cat /proc/cpuinfo | grep \"model name\\|processor\""); ?>


<b><?php esc_html_e( "SQL Client library", "Host-Info" ); ?>:</b> 
<?php printf("Client library version: %s\n", mysqli_get_client_info());?>
</pre>


    <table id="HI_table">
        <thead>
            <tr>
                <th>
                    <?php esc_html_e( "Key", "Host-Info" ); ?>
                </th>
                <th>
                    <?php esc_html_e( "Value", "Host-Info" ); ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;
			foreach ( $_SERVER as $key => $val ) { 
				$striped = ( $i % 2 ) ? "deelbaar" : "nietdeelbaar"; ?>
                 <tr class="<?php echo esc_attr( $striped ); ?>">
                    <th>
                        <?php echo $key ; ?>
                    </th>
                    <td>
                        <?php echo wordwrap($val, 100, "<br>\n", true); ?>
                    </td>
                </tr>
                <?php
				$i++;
			} ?>
        </tbody>
    </table>



<span class="footer"><?php esc_html_e( "Thank you for using Host Info, created by: ", "Host-Info" ); ?> <a href="https://willemso.com/" target="_blank">Willems Olivier</a></span>
</div>
