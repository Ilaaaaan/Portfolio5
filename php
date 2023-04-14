<!DOCTYPE html>
<html>
<head>
	<title>Animation de ligne</title>
	<style type="text/css">
		#canvas {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: -1;
		}
		.dot {
			position: absolute;
			width: 30px;
			height: 30px;
			border-radius: 50%;
			cursor: pointer;
		}
		.dot-1 {
			background-color: red;
			top: 50%;
			left: 20%;
		}
		.dot-2 {
			background-color: blue;
			top: 50%;
			right: 20%;
		}
	</style>
</head>
<body>
	<div id="canvas"></div>
	<div class="dot dot-1"></div>
	<div class="dot dot-2"></div>
        <script type="text/javascript">
            // Récupération des points
            const dot1 = document.querySelector('.dot-1');
            const dot2 = document.querySelector('.dot-2');

            // Création du canvas
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            document.querySelector('#canvas').appendChild(canvas);

            // Fonction pour dessiner la ligne
            function drawLine(startX, startY, endX, endY, color) {
                context.beginPath();
                context.moveTo(startX, startY);
                context.lineTo(endX, endY);
                context.strokeStyle = color;
                context.lineWidth = 5;
                context.stroke();
            }

            // Fonction pour effacer le canvas
            function clearCanvas() {
                context.clearRect(0, 0, canvas.width, canvas.height);
            }

            // Fonction pour animer la ligne
            function animateLine(dot1X, dot1Y, dot2X, dot2Y, color) {
                clearCanvas();
                drawLine(dot1X, dot1Y, dot2X, dot2Y, color);
                requestAnimationFrame(() => animateLine(dot1X, dot1Y, dot2X, dot2Y, color));
            }

            // Animation de la ligne au survol des points
            dot1.addEventListener('mouseover', () => {
                const dot1Rect = dot1.getBoundingClientRect();
                const dot2Rect = dot2.getBoundingClientRect();
                const dot1X = dot1Rect.left + dot1Rect.width / 2;
                const dot1Y = dot1Rect.top + dot1Rect.height / 2;
                const dot2X = dot2Rect.left + dot2Rect.width / 2;
                const dot2Y = dot2Rect.top + dot2Rect.height / 2;
                animateLine(dot1X, dot1Y, dot2X, dot2Y, 'red');
            });

            dot2.addEventListener('mouseover', () => {
                const dot1Rect = dot1.getBoundingClientRect();
                const dot2Rect = dot2.getBoundingClientRect();
                const dot1X = dot1Rect.left + dot1Rect.width / 2;
                const dot1Y = dot1Rect.top + dot1Rect.height / 2;
                const dot2X = dot2Rect.left + dot2Rect.width / 2;
                const dot2Y = dot2Rect.top + dot2Rect.height / 2;
                animateLine(dot1X, dot1Y, dot2X	, 'blue');
            });
        </script>
</body>
</html>
