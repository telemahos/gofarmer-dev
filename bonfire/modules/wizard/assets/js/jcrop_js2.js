
$('#target').Jcrop({
            // onSelect:    showCoords,
            bgColor:     'black',
            bgOpacity:   .4,
            // setSelect:   [ 100, 100, 260, 195 ], 
            setSelect:   [ 100, 100, 350, 350  ],
            aspectRatio: 4 / 3,
             boxWidth: 400, 
             boxHeight: 450 ,
             onChange: updateCoords,
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
				$('#x2').val(c.x2);
				$('#y2').val(c.y2);
				$('#w').val(c.w);
				$('#h').val(c.h);
			};

			function checkCoords()
			{
				if (parseInt($('#w').val())) return true;
				alert('Please select a crop region then press submit.');
				return false;
			};