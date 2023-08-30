<?php
require_once('db.config.php');




// Fetch data from the dailylotto table
$query = "SELECT * FROM lotto";
$result = $conn->query($query);
$data = $result->fetchAll(PDO::FETCH_ASSOC);


$conn = null;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lotto Data</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Lotto Data</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Draw Date</th>
                    <th>Draw Number</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                <tr>
                    <td><?php echo $row['DrawDate']; ?></td>
                    <td><?php echo $row['DrawNumber']; ?></td>
                    <td><?php echo $row['Ball1']; ?></td>
                    <td><?php echo $row['Ball2']; ?></td>
                    <td><?php echo $row['Ball3']; ?></td>
                    <td><?php echo $row['Ball4']; ?></td>
                    <td><?php echo $row['Ball5']; ?></td>
                    <td><?php echo $row['Ball6']; ?></td>
                    <td><?php echo $row['BonusBall']; ?></td>
                    <td><?php echo $row['Div1Winners']; ?></td>
                    <td><?php echo $row['Div1Payout']; ?></td>
                    <td><?php echo $row['Div2Winners']; ?></td>
                    <td><?php echo $row['Div2Payout']; ?></td>
                    <td><?php echo $row['Div3Winners']; ?></td>
                    <td><?php echo $row['Div3Payout']; ?></td>
                    <td><?php echo $row['Div4Winners']; ?></td>
                    <td><?php echo $row['Div4Payout']; ?></td>
                    <td><?php echo $row['Div5Winners']; ?></td>
                    <td><?php echo $row['Div5Payout']; ?></td>
                    <td><?php echo $row['Div6Winners']; ?></td>
                    <td><?php echo $row['Div6Payout']; ?></td>
                    <td><?php echo $row['Div7Winners']; ?></td>
                    <td><?php echo $row['Div7Payout']; ?></td>
                    <td><?php echo $row['Div8Winners']; ?></td>
                    <td><?php echo $row['Div8Payout']; ?></td>
                    <td><?php echo $row['RolloverAmount']; ?></td>
                    <td><?php echo $row['RolloverNumber']; ?></td>
                    <td><?php echo $row['TotalPrizePool']; ?></td>
                    <td><?php echo $row['TotalSales']; ?></td>
                    <td><?php echo $row['EstimatedJackpot']; ?></td>
                    <td><?php echo $row['GuaranteedJackpot']; ?></td>
                    <td><?php echo $row['DrawMachine']; ?></td>
                    <td><?php echo $row['BallSet']; ?></td>
                    <td><?php echo $row['GPWinners']; ?></td>
                    <td><?php echo $row['WCWinners']; ?></td>
                    <td><?php echo $row['NCWinners']; ?></td>
                    <td><?php echo $row['ECWinners']; ?></td>
                    <td><?php echo $row['MPWinners']; ?></td>
                    <td><?php echo $row['LPWinners']; ?></td>
                    <td><?php echo $row['FSWinners']; ?></td>
                    <td><?php echo $row['KZNWinners']; ?></td>
                    <td><?php echo $row['NWWinners']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <button class="btn btn-primary" data-toggle="modal" data-target="#dataModal">View Details</button>

        <!-- Bootstrap Modal -->
        <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dataModalLabel">Modal Title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>

                        </p>
                        <!-- Add dynamic content here based on the selected row's data -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>