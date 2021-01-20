wp.blocks.registerBlockType('gyapan/email-confirm', {
  title: 'Email Confirmation Box',
  icon: 'iconEmail',
  category: 'common',
  attributes: {
    title: { type: 'string' },
    
  },

  edit: function (props) {
    function updateTitle(event) {
      props.setAttributes({ title: event.target.value });
    }
    return React.createElement(
      "div",
      null,
      React.createElement(
        "h3",
        null,
        "Assign3 Plugin"
      ),
      React.createElement(
        'input',
        {
          type: 'text',
          placeholder: 'Enter title here...',
          value: props.attributes.title,
          onChange: updateTitle,
          style: { width: '100%' }
        }
      ),
    );
  },
  save: function (props) {
   
    
    return wp.element.createElement(
      "div",
      {class:'mainDiv'},
      wp.element.createElement(
        "h3",
        null,
        props.attributes.title
      ),
      wp.element.createElement(
        'input',
        {
          type: 'email',
          placeholder: 'Enter email to be verified here...',
          value: props.attributes.email,       
          style: { width: '100%' },
          class:'emailAdd'
        }
      ),
      wp.element.createElement(
        'button',
        {
          type: 'submit',
          class:'clicker',
          style: { width: '50%', height: 'auto', backgroundColor: "blue", color: "white", margin: '10px', padding: '10px' }
        },
        "Verify"

      )
    )
  }
})