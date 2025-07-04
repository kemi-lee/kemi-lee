import java.awt.*;
import javax.swing.*;
import java.awt.event.*;

public class ButtonDemo extends JFrame implements ActionListener {
		
	//global variables
	JButton incbutton;
	JButton decbutton;
	JLabel numlabel;
	int number = 0;
	
	public static void main(String[] args) {
		
		ButtonDemo myframe = new ButtonDemo();
		myframe.setSize( 350, 400 );
		myframe.setTitle( "My Awesome App" );
		myframe.setDefaultCloseOperation( JFrame.EXIT_ON_CLOSE );
		myframe.setLocationRelativeTo( null );
		myframe.setResizable( true );
		myframe.setVisible( true );
		
	} //ends main
	
	public ButtonDemo() {
		
		Container c  = this.getContentPane();
		c.setLayout( new FlowLayout() );
		
		Color myBrown = new Color( 150, 75, 0 );
		c.setBackground( myBrown );
		
		//set title of application
		JLabel title = new JLabel( "My Button Demo" );
		title.setForeground( Color.pink);
		title.setFont( new Font("Verdana", Font.BOLD, 28 ) );
		c.add( title );
		
		//add buttons
		incbutton = new JButton( "Increment" );
		incbutton.setForeground( Color.pink);
		c.add(incbutton );
		incbutton.addActionListener(this);
		
		decbutton = new JButton( "Decrement" );
		decbutton.setForeground( Color.pink);
		c.add( decbutton );
		decbutton.addActionListener(this);
		
		numlabel = new JLabel( "" + number );
		numlabel.setFont( new Font( "Verdana", Font.BOLD, 200));
		numlabel.setForeground( Color.white);
		c.add( numlabel);
		
	} //ends ButtonDemo constructor
	
	public void actionPerformed( ActionEvent e ) {
		
		if( e .getSource() == incbutton ) {
			
			number++;
		}
		else {
			
			number--; 
		}
		
		if( number % 2 == 0 ) {
		
			numlabel.setForeground(Color.yellow );
		}
		else {
			
			numlabel.setForeground( Color.blue);
		}
		numlabel.setText( "" + number );
	}

} //ends class
