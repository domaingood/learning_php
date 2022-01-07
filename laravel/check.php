<?php
/**
 *  Server requirements script
 *
 *  This script checks for common required components on server before installing a production application
 */

/**
 * #######################################
 *  Configuration
 * #######################################
 */

$requirements = new stdClass();

// PHP Version selection
$requirements->phpMin = '5.6.0';
$requirements->phpMax = '8.0.0';

// Check for cURL support ?
$requirements->curl = true;

// Check for JSON support ?
$requirements->json = true;

// Check for MCrypt support ?
$requirements->mcrypt = true;

// Check for mbstring support ?
$requirements->mbstring = true;

// Check if PEAR is installed ?
$requirements->pear = true;

// Write permission check
$requirements->writeCheck = true;
$requirements->writeDir   = __DIR__;

// GD Support check
$requirements->gdCheck    = true;
$requirements->gdShowMore = true; // Show more details about gd ?

// Check for BC Math support ?
$requirements->bcmath = true;

// Check for MySQLi support ?
$requirements->mysqli = true;

// Check for PDO support ?
$requirements->pdo = true;

// Check for sockets support ?
$requirements->sockets = true;

/**
 * #######################################
 *  Checking functions
 * #######################################
 */

/**
 * Compare php verison from server with a given min and max
 * @param $min
 * @param $max
 * @return bool
 */
function _isPhpValid($min, $max)
{
    if (version_compare(PHP_VERSION, $min) >= 0 && version_compare(PHP_VERSION, $max) <= 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * Check if cURL is enabled
 * @return bool
 */
function _isCurl()
{
    return function_exists('curl_version') && extension_loaded('curl');
}

/**
 * Check if JSON is enabled
 * @return bool
 */
function _isJson()
{
    return function_exists('json_encode') && extension_loaded('json');
}

/**
 * Check if MCrypt is enabled
 * @return bool
 */
function _isMcrypt()
{
    return function_exists('mcrypt_encrypt') && extension_loaded('mcrypt');
}

/**
 * Check if mbstring is enabled
 * @return bool
 */
function _isMbstring()
{
    return extension_loaded('mbstring');
}

/**
 * Check if PEAR is installed
 * @return bool
 */
function _isPEAR()
{
    $filePath = stream_resolve_include_path('System.php');
    if ($filePath !== false) {
        require_once('System.php'); // you could use $filePath as well
        if (class_exists('System') === true) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/**
 * Check if directory is writable
 * @param string $target Target directory
 * @return bool
 */
function _isWritable($target)
{
    return is_writable(realpath($target));
}

/**
 * Check if GD is enabled
 * @return bool
 */
function _isGD()
{
    return function_exists('gd_info') && extension_loaded('gd');
}

/**
 * Check if bcmath is enabled
 * @return bool
 */
function _isBcmath()
{
    return function_exists('bcpowmod') && extension_loaded('bcmath');
}

/**
 * Check if MySQLi is enabled
 * @return bool
 */
function _isMysqli()
{
    return function_exists('mysqli_connect') && extension_loaded('mysqli');
}

/**
 * Check if PDO is enabled
 * @return bool
 */
function _isPDO()
{
    return extension_loaded('PDO');
}

/**
 * Check if sockets is enabled
 * @return bool
 */
function _isSockets()
{
    return extension_loaded('sockets');
}


/**
 * #######################################
 *  Page Output
 * #######################################
 */
?>
<html>
<head>
    <title>Requirements Checker</title>
    <style>
        html {
            background-color: #d7d7d7;
        }

        body {
            font-family: "Arial", sans-serif;
            max-width: 860px;
            margin: 40px auto;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
            padding: 25px;
            box-sizing: border-box;
        }

        .check_ok {
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAMCAYAAABr5z2BAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEwAACxMBAJqcGAAAAdFJREFUKJGVktFLU2EYxn/HnbHDSGONIKfeRcqYa6AyMFngTUwCRWhhV131D3jVbCqk5bUXuxGiEAoiHLguEu8KjBBiEIRhguAwDQnZkbHzfed8n1eTZQb6Xr3vA7+Hl+d94YLV86xnIr2Qfs0UTQDmReDEXCI3khrJ+vAFXM/1rU6tjvnOC8fn4rmh/qGsRltSSaM93B6t/Kr8PtkgNB6KudJ17Hl78zQcm4nlBnsHs1JJS3gCpRXlj+XF0nQpb9bh4VvDBa20WmLpbqNJdCaaG+gdyEqk5UgHrTW7n3ffLE8vPwTwhcZDsXR/utByueW6P+APt15tvbMT2VkRX8Sfrqddk8lEMus1eZbwBEIJ9tf33xUni2OABjCDZrDTMI0rVVlFowk2B2+kkqni1vOtlXg0/qhGzZJCYgubo9JRYW127X4dBjAAOp50ZPpu9uXNgBlWWqFQKK04qB6wV93jsHaI89V5a7+wHwBeYz5GvYk8jmS64915w2+Ey3aZ7co2NbcGgPqmCuqlygDu6YCNxqFtou1e5VJl3sa+diJu8J5XjALyrPP+9Qf2J/u76BQ/MbmNppkNPrDIKCDOgv8xAGCdH0TZxMVigQzg/A8GOAZSQcXE4Oz/qQAAAABJRU5ErkJggg==');
            width: 16px;
            height: 12px;
            display: inline-block;
        }

        .check_fail {
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEwAACxMBAJqcGAAAAjhJREFUOI2Fk+9PUlEYx7/Hi9B2x8V7b8wyV5ltMfs5YzUUdQhUb1z2H7Qp/hX+I01b4NZ7XlSWrBFkupaLRmuVTFKqoSJcfoztcjmX04uE8av1bOfNeT7fz/OcFwc4rgAgr0/bk34L78I/akUQvO88t3aWAKmlEQDkTzNT2cKij/3wzdJukhVB8O4uPKCFRR+LzTgzdQkJAPK1e+PbF2zDDWs2c6RHgxHvw3I5DABPBeHu+P3J56IscXUm+SVxtBXavETWRy8nr9qvDLVPzGZyenRtw2vkmGnM43wmnhS5dia+9TlB/DzvmnDaQ3KTvSHJ5vQe0gNR6uvo5ZQ8fRPenCYA4Od518To9ZAktoGMgVU1oErBdB2o6QBjyBVLNPJ9xz2vqlFSZ/0873KOjIQkQeBYtQqoKpimAYy1OJVymYZ3d6cXKH0LAKS56TeZXI5TgyGJM3SsDAC5iqqv/95zzwGR+p2hGSCUGqFqqPWSzjSAWrXWcdcglznuzph14IWl19R1euMJWkV/f/CzsQUBgCWO8zqsZ1bN/wnXq6Cp+odjCXnMcZ6b1sGXZmNnuKipOgAIxhNdex/3U26yahYTw5L1YjtQ0lQaS6fcBCA3Tp99be4iSSiH33p+lZTbqVI+QwlB/ShahcbSKfc8EJ0DIlvplFvRKnozs1dUDg6LeQeAv59pTe7PxIdsbGPgXHUZmGyf9giGqY2B8zQ+ZGOvpP79J0BfCxAA5KBF3O4WbpYELeLX5vAfETvzqIeEC14AAAAASUVORK5CYII=');
            width: 16px;
            height: 16px;
            display: inline-block;
        }

        table {
            width: 100%;
            border-spacing: 0;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        table tr > td {
            padding: 10px;
            border-right: 1px dashed #ccc;
            border-bottom: 1px dashed #ccc;
        }

        table tr > td:last-child {
            border-right: 0;
        }

        table tr:last-child > td {
            border-bottom: 0;
        }

        ul li {
            margin-bottom: 3px;
        }

        .section {
            border-radius: 10px;
            border: 1px solid #ccc;
            padding: 15px;
            background-color: #ddd;
        }
    </style>
</head>
<body>
<h1 style="text-align: center;">Server Requirements Checker</h1>
<hr>
<br>
<h2>General requirements</h2>
<table>
    <tr>
        <td>PHP Version (Needed: Min <?php echo $requirements->phpMin; ?>, Max <?php echo $requirements->phpMax; ?>)</td>
        <td>
            <?php

            if (_isPhpValid($requirements->phpMin, $requirements->phpMax)) {
                echo PHP_VERSION . ' <span class="check_ok"></span>';
            } else {
                echo PHP_VERSION . ' <span class="check_fail"></span>';
            }
            ?>
        </td>
    </tr>
    <?php if ($requirements->curl) { ?>
        <tr>
            <td>cURL support</td>
            <td>
                <?php
                if (_isCurl()) {
                    echo 'Yes <span class="check_ok"></span>';
                } else {
                    echo 'No <span class="check_fail"></span>';
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    <?php if ($requirements->json) { ?>
        <tr>
            <td>JSON support</td>
            <td>
                <?php
                if (_isJson()) {
                    echo 'Yes <span class="check_ok"></span>';
                } else {
                    echo 'No <span class="check_fail"></span>';
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    <?php if ($requirements->mcrypt) { ?>
        <tr>
            <td>MCrypt support</td>
            <td>
                <?php
                if (_isMcrypt()) {
                    echo 'Yes <span class="check_ok"></span>';
                } else {
                    echo 'No <span class="check_fail"></span>';
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    <?php if ($requirements->mbstring) { ?>
        <tr>
            <td>mbstring support</td>
            <td>
                <?php
                if (_isMbstring()) {
                    echo 'Yes <span class="check_ok"></span>';
                } else {
                    echo 'No <span class="check_fail"></span>';
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    <?php if ($requirements->pear) { ?>
        <tr>
            <td>Is PEAR installed ?</td>
            <td>
                <?php
                if (_isPEAR()) {
                    echo 'Yes <span class="check_ok"></span>';
                } else {
                    echo 'No <span class="check_fail"></span>';
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    <?php if ($requirements->writeCheck) { ?>
        <tr>
            <td>
                Is directory writable ?<br>
                <span style="font-style: italic; font-size: smaller">(<?php echo realpath($requirements->writeDir); ?>)</span>
            </td>
            <td>
                <?php
                if (_isWritable($requirements->writeDir)) {
                    echo 'Yes <span class="check_ok"></span>';
                } else {
                    echo 'No <span class="check_fail"></span>';
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    <?php if ($requirements->gdCheck) { ?>
        <tr>
            <td>GD support</td>
            <td>
                <?php
                if (_isGD()) {
                    echo 'Yes <span class="check_ok"></span>';
                } else {
                    echo 'No <span class="check_fail"></span>';
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    <?php if ($requirements->bcmath) { ?>
        <tr>
            <td>BC Math support</td>
            <td>
                <?php
                if (_isBcmath()) {
                    echo 'Yes <span class="check_ok"></span>';
                } else {
                    echo 'No <span class="check_fail"></span>';
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    <?php if ($requirements->mysqli) { ?>
        <tr>
            <td>MySQLi support</td>
            <td>
                <?php
                if (_isMysqli()) {
                    echo 'Yes <span class="check_ok"></span>';
                } else {
                    echo 'No <span class="check_fail"></span>';
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    <?php if ($requirements->pdo) { ?>
        <tr>
            <td>PDO support</td>
            <td>
                <?php
                if (_isPDO()) {
                    $drivers = '';
                    foreach (PDO::getAvailableDrivers() as $driver) {
                        $drivers .= $driver . '; ';
                    }
                    echo 'Yes ( ' . $drivers . ') <span class="check_ok"></span>';
                } else {
                    echo 'No <span class="check_fail"></span>';
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    <?php if ($requirements->sockets) { ?>
        <tr>
            <td>Sockets support</td>
            <td>
                <?php
                if (_isSockets()) {
                    echo 'Yes <span class="check_ok"></span>';
                } else {
                    echo 'No <span class="check_fail"></span>';
                }
                ?>
            </td>
        </tr>
    <?php } ?>
</table>
<br>
<?php if ($requirements->gdShowMore && _isGD()) { ?>
    <h2>More information about GD library</h2>
    <div class="section">
        <ul>
            <?php
            $infoList = gd_info();
            while (list ($key, $val) = each($infoList)) {
                echo '<li>' . $key . ' -- ' . $val . '</li>';
            }
            ?>
        </ul>
    </div>
<?php } ?>
</body>
</html>