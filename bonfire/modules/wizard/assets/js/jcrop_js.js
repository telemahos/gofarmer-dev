
$('#target').Jcrop({
            // onSelect:    showCoords,
            bgColor:     'black',
            bgOpacity:   .4,
            setSelect:   [ 100, 100, 400, 300 ],
            aspectRatio: 4 / 3,
             boxWidth: 450, boxHeight: 400 ,
             onSelect: updateCoords
        });

// $(function(){

// 				$('#cropbox').Jcrop({
// 					 setSelect:   [ 50, 50, 300, 225 ],
//             			aspectRatio: 4 / 3,
// 					onSelect: updateCoords
// 				});

// 			});

			function updateCoords(c)
			{
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			};

			function checkCoords()
			{
				if (parseInt($('#w').val())) return true;
				alert('Please select a crop region then press submit.');
				return false;
			};