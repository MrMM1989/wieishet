
/**
 * Constant variable ROOT
 */
var ROOT = '/wieishet';


/**
 * Function for handling the upload form category selection 
 */
function upload_category()
{
	$('#category').change(function() 
	{
		$('#upload-form ul li.question-element').remove();
		$('#upload-form ul li.question-submit').remove();
		
		var index = $('#category').val();
		
		var link =  ROOT + '/home/question_category'; 
		
		$.post(link, {category: index}, function (data)
		{			
			try
			{				
				var parsed_data = JSON.parse(data);
				
				for (var key in parsed_data)
				{
					var span = $('<span>').attr('class', 'question').html(parsed_data[key]['question']);
									
					var labelYes = $('<label>').attr('for', 'ja-'+parsed_data[key]['id']).text('Ja');
					
					var inputYes = $('<input>').attr({'type': 'radio', 'value': true ,'name': parsed_data[key]['id'], 'id': 'ja-'+parsed_data[key]['id'], 'data-val': parsed_data[key]['val_group']});
					
					var labelNo = $('<label>').attr('for', 'nee-'+parsed_data[key]['id']).text('Nee');
					
					var inputNo = $('<input>').attr({'type': 'radio', 'value': false , 'name': parsed_data[key]['id'], 'id': 'nee-'+parsed_data[key]['id'], 'data-val': parsed_data[key]['val_group'], 'checked': true});
					
					var li = $('<li>').attr('class', 'question-element').append(span).append(inputYes).append(labelYes).append(inputNo).append(labelNo);	
					
					li.appendTo($('#upload-form ul'));			
				}
				
				var submitButton = $('<input>').attr({'type': 'submit', 'value': 'Verzenden', 'name': 'submit'});
				
				var li = $('<li>').attr('class', 'question-submit').append(submitButton);
				
				li.appendTo($('#upload-form ul'));	
			}
			catch (e)
			{
				console.error('Parsing error: ', e);
			}
						
		});

	});
	
	$('#category').trigger('change');
}


/**
 * Function for submitting the upload form 
 */
function upload_form_submit()
{
	$('#upload-form').submit(function(event)
	{
		
		var form_properties = [];
		
		
		$('li.question-element').each(function(){
			
		   var value 	=	$(this).children(':radio:checked').val();
		   var id 		=	$(this).children(':radio:checked').attr('name');
		   
		   var object 	=  {
		   	
		   		id: id,
		   		value: value		   	
		   };
		   
		   form_properties.push(object); 	   
									
		});
		
		var hidden = $('<input>').attr({'type': 'hidden', 'name': 'hidden', 'id': 'hidden', 'value': JSON.stringify(form_properties)});
		
		var li = $('<li>').attr('class', 'question-submit').append(hidden);
				
		li.appendTo($('#upload-form ul'));	
		
	});
}

$( document ).ready(function() 
{
 	
 	upload_category(); 
 	upload_form_submit();
 	 	 	
});