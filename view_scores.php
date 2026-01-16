<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "kidemy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$records = mysqli_query($conn, "SELECT * FROM student_scores ORDER BY date_taken DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidemy | Score History</title>
    <style>
        :root {
            --primary: #dc2626;
            --bg: #f3f4f6;
            --card-bg: #ffffff;
            --text-main: #1f2937;
            --text-muted: #6b7280;
        }

        body { 
            font-family: 'Inter', 'Segoe UI', sans-serif; 
            background-color: var(--bg); 
            margin: 0; 
            padding: 40px;
            color: var(--text-main);
        }

        .dashboard-wrapper {
            max-width: 1000px;
            margin: 0 auto;
        }

       
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .btn-back {
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 600;
            transition: color 0.2s;
        }
        .btn-back:hover { color: var(--primary); }

        
        .header-card {
            background: var(--card-bg);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-card h1 { margin: 0; font-size: 28px; color: var(--text-main); }
        .header-card p { margin: 5px 0 0; color: var(--text-muted); }

        .table-container {
            background: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background-color: #f9fafb;
            border-bottom: 2px solid #f3f4f6;
        }

        th {
            padding: 20px;
            color: var(--text-muted);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        td {
            padding: 20px;
            border-bottom: 1px solid #f3f4f6;
            font-size: 15px;
        }

        tr:last-child td { border-bottom: none; }
        tr:hover { background-color: #fffafb; }

        
        .score-pill {
            display: inline-block;
            padding: 6px 16px;
            background: #fee2e2;
            color: var(--primary);
            border-radius: 99px;
            font-weight: 700;
            font-size: 14px;
        }

        .subject-name {
            font-weight: 600;
            color: var(--text-main);
        }

        .date-text {
            color: var(--text-muted);
            font-size: 14px;
        }

        
        @media (max-width: 600px) {
            body { padding: 15px; }
            .header-card { flex-direction: column; text-align: center; }
        }
    </style>
</head>
<body>

    <div class="dashboard-wrapper">
        <div class="top-bar">
            <a href="Dashboard.php" class="btn-back">← Back to Dashboard</a>
        </div>

        <header class="header-card">
            <div>
                <h1>Student Score History</h1>
                <p>Track your academic progress across all subjects.</p>
            </div>
            <div style="font-size: 40px;">📈</div>
        </header>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Quiz Subject</th>
                        <th>Student</th>
                        <th>Result</th>
                        <th>Date Taken</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($records) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($records)): ?>
                        <tr>
                            <td class="subject-name"><?php echo htmlspecialchars($row['quiz_subject']); ?></td>
                            <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                            <td>
                                <span class="score-pill">
                                    <?php echo $row['score_achieved']; ?> / <?php echo $row['total_questions']; ?>
                                </span>
                            </td>
                            <td class="date-text">
                                <?php echo date('F d, Y | h:i A', strtotime($row['date_taken'])); ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align:center; padding: 60px; color: var(--text-muted);">
                            No records available yet. Take a quiz to see your results!
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>