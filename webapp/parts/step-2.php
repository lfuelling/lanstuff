<div class="card mt-4">
    <div class="card-header">
        Step 2
    </div>
    <div class="card-body">
        <h5 class="card-title">File List</h5>
        <p class="card-text">Here you can see every Torrent file available. Just pick the torrents you want/need and
            open them using Transmission.</p>
    </div>
    <?php
    $path = "./torrents/";

    function createDir($path = '.')
    {
        if ($handle = opendir($path)) {
            echo "<ul class='list-group list-group-flush'>";

            while (false !== ($file = readdir($handle))) {
                if (is_dir($path . $file) && $file != '.' && $file != '..')
                    printSubDir($file, $path, $queue);
                else if ($file != '.' && $file != '..')
                    $queue[] = $file;
            }

            printQueue($queue, $path);
            echo "</ul>";
        }
    }

    function printQueue($queue, $path)
    {
        foreach ($queue as $file) {
            printFile($file, $path);
        }
    }

    function printFile($file, $path)
    {
        echo "<li class='list-group-item'><a href=\"" . $path . $file . "\">$file</a></li>";
    }

    function printSubDir($dir, $path)
    {
        echo "<li class='list-group-item'><span class=\"toggle\">$dir</span>";
        createDir($path . $dir . "/");
        echo "</li>";
    }

    createDir($path);
    ?>
</div>
