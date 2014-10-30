package cz.honza.backpropagation.export;

import java.util.ArrayList;
import java.util.List;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.LinearLayout;
import android.widget.TextView;
import cz.honza.backpropagation.R;
import cz.honza.backpropagation.util.NetworkActivity;

public class EditorActivity extends NetworkActivity {
	
	protected LinearLayout mData;
	protected List<Integer> mLayers;
	
	protected void refresh()
	{
		mData.removeAllViews();
		final LayoutInflater li = LayoutInflater.from(this);
		for (int i = 0; i < mLayers.size(); i++)
		{
			final View item = li.inflate(R.layout.editor_item, mData, false);
			final TextView tv = (TextView)item.findViewById(R.id.editor_item_text);
			final int val = mLayers.get(i);
			tv.setText(String.valueOf(val));
			final int finali = i;
			
			final View plus = item.findViewById(R.id.editor_item_plus);
			final View minus = item.findViewById(R.id.editor_item_minus);
			final View delete = item.findViewById(R.id.editor_item_delete);
			
			if (val < 2)
				minus.setEnabled(false);
			if (mLayers.size() < 3)
				delete.setEnabled(false);
			
			plus.setOnClickListener(new View.OnClickListener() {
				@Override
				public void onClick(View v) {
					mLayers.set(finali, val + 1);
					refresh();
				}
			});
			
			
			minus.setOnClickListener(new View.OnClickListener() {
				@Override
				public void onClick(View v) {
					mLayers.set(finali, val - 1);
					refresh();
				}
			});
			
			
			delete.setOnClickListener(new View.OnClickListener() {
				@Override
				public void onClick(View v) {
					mLayers.remove(finali);
					refresh();
				}
			});
			
			mData.addView(item);
		}
	}
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.editor);
		setCancelButton(R.id.editor_cancel);
		mData = (LinearLayout)findViewById(R.id.editor_data);
		mLayers = new ArrayList<Integer>();
		mLayers.add(1);
		mLayers.add(1);
		refresh();
	}
}
