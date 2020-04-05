function Message()
{
	this.id;
	this.nick;
	this.color;
	this.message;
	this.created_at;
}

Message.prototype.assign = function(properties) 
{	
	for (i in properties) 
	{
		if (properties.hasOwnProperty(i))
			this[i] = properties[i];
	}
}

Message.prototype.view = function()
{
	return `<div class="msg" style="color:${this.color};">` + 
		`[${this.created_at}] <strong>${this.nick}:</strong> ${this.message}` + 
		`</div>`;
}