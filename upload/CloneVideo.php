<?php
echo shell_exec('ffmpeg -threads 2 -i '.$argv[2].' -f webm '.$argv[1].'.webm; ffmpeg -threads 2 -i sample_video.mp4 -f ogg '.$argv[1].'.ogv');