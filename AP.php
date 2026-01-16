<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Araling Panlipunan Modules | Kidemy</title>
    <style>
        body { font-family: sans-serif; background: #f0f2f5; padding: 20px; display: flex; justify-content: center; margin: 0; }
        .frame { width: 100%; max-width: 400px; background: #fff; padding: 20px; border-radius: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        
        
        .card { display: flex; gap: 15px; padding: 14px; margin-bottom: 8px; border-radius: 15px; border: 1px solid #eee; text-decoration: none; color: #333; transition: 0.2s; align-items: center; }
        .card:hover { border-color: #e67e22; background: #fffaf5; transform: translateY(-2px); }
        
        
        .card-home { background: #e67e22; border: none; color: white; margin-bottom: 20px; }
        .card-home:hover { background: #d35400; color: white; }
        .card-home .num { background: rgba(255,255,255,0.2); color: white; }

        .num { width: 32px; height: 32px; background: #fff3e0; color: #e67e22; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; flex-shrink: 0; }
        h2 { color: #2c3e50; margin-bottom: 20px; }
        small { color: #888; }

      
        #movableBtn {
            position: fixed; bottom: 20px; right: 20px; width: 60px; height: 60px;
            background: #e67e22; color: white; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 24px; cursor: move; box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            z-index: 1000; text-decoration: none; touch-action: none;
        }
    </style>
</head>
<body>

<a href="Dashboard.php" id="movableBtn">🏠</a>

<div class="frame">
    <h2>Araling Panlipunan 4</h2>

    <a href="Dashboard.php" class="card card-home">
        <div class="num">🏠</div>
        <div>
            <strong>Back to Dashboard</strong><br>
            <small style="color: #ffe0b2;">Return to the main menu</small>
        </div>
    </a>

    <?php
    $lessons = [
        1 => "Ang Pilipinas sa Mundo", 
        2 => "Relatibong Lokasyon", 
        3 => "Katangiang Heograpikal", 
        4 => "Klima at Panahon", 
        5 => "Yamang Lupa at Tubig",
        6 => "Likas na Yaman at Ekonomiya", 
        7 => "Mga Isyung Pangkapaligiran", 
        8 => "Pangangalaga sa Yaman" 
    ];

    foreach ($lessons as $id => $title) {
        $targetFile = "AP_lesson" . $id . ".php";
        echo "
        <a class='card' href='$targetFile?id=$id'>
            <div class='num'>$id</div>
            <div>
                <small>Week $id</small><br>
                <strong>$title</strong>
            </div>
        </a>";
    }
    ?>
</div>



<script>
    
    const dragItem = document.querySelector("#movableBtn");
    let active = false;
    let currentX, currentY, initialX, initialY;
    let xOffset = 0, yOffset = 0;

    const events = [
        ["touchstart", dragStart], ["touchend", dragEnd], ["touchmove", drag],
        ["mousedown", dragStart], ["mouseup", dragEnd], ["mousemove", drag]
    ];
    events.forEach(e => document.addEventListener(e[0], e[1], { passive: false }));

    function dragStart(e) {
        if (e.type === "touchstart") {
            initialX = e.touches[0].clientX - xOffset;
            initialY = e.touches[0].clientY - yOffset;
        } else {
            initialX = e.clientX - xOffset;
            initialY = e.clientY - yOffset;
        }
        if (e.target === dragItem) active = true;
    }

    function dragEnd() {
        initialX = currentX;
        initialY = currentY;
        active = false;
    }

    function drag(e) {
        if (active) {
            e.preventDefault();
            if (e.type === "touchmove") {
                currentX = e.touches[0].clientX - initialX;
                currentY = e.touches[0].clientY - initialY;
            } else {
                currentX = e.clientX - initialX;
                currentY = e.clientY - initialY;
            }
            xOffset = currentX;
            yOffset = currentY;
            dragItem.style.transform = `translate3d(${currentX}px, ${currentY}px, 0)`;
        }
    }
</script>

</body>
</html>