package cz.honza.backpropagation.result;

import cz.honza.backpropagation.NetworkApplication;
import cz.honza.backpropagation.network.Network;
import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.Bitmap.Config;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.util.AttributeSet;
import android.view.View;

public class ResultView extends View {

	public ResultView(Context context) {
		super(context);
	}

 	public ResultView(Context context, AttributeSet attrs) {
 		super(context, attrs);
 	}
 	
 	public ResultView(Context context, AttributeSet attrs, int defStyleAttr) {
 		super(context, attrs, defStyleAttr);
 	}
 	
	@Override
	protected void onDraw(Canvas canvas) {
		
		final Network n = NetworkApplication.sNetwork;
		
		if (n == null)
			return;
		
		final int width = getWidth();
		final int height = getHeight();
		Paint paint = new Paint();
		Bitmap bmp = Bitmap.createBitmap(width, height, Config.ARGB_8888);
		double[] input = {0, 0};
		double[] output = {0, 0.5};
		
		for (int i = 0; i < width; i++)
		{
			for (int j = 0; j < height; j++)
			{
				input[0] = -0.5 + 2 * i / (double) width;
				input[1] = 1.5 - 2 * j / (double) height;
				n.calculate(input, output);
				bmp.setPixel(i, j, Color.argb(255, 128, (int)(255 * output[0] + 0.5), (int)(255 * output[1] + 0.5)));
			}
		}
		canvas.drawBitmap(bmp, 0, 0, paint);
		float x0 = width / 4;
		float y0 = height * 3 / 4;
		canvas.drawLine(0, y0, width, y0, paint);
		canvas.drawLine(x0, 0, x0, height, paint);
	}
 	
 	
}
