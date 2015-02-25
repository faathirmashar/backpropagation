package cz.honza.backpropagation.editor;

import java.util.ArrayList;

import cz.honza.backpropagation.R;

import android.app.Activity;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

public class TrainingAdapter extends ArrayAdapter<ArrayList<ArrayList<Double>>> {

	LayoutInflater mInflater;
	
	public TrainingAdapter(TrainingSetActivity context, int resource,
			ArrayList<ArrayList<ArrayList<Double>>> data) {
		super(context, resource, data);
		mInflater = LayoutInflater.from(context);
	}
	
	@Override
	public View getView (final int position, View convertView, ViewGroup parent)
	{
		if (convertView == null)
		{
			convertView = mInflater.inflate(R.layout.training_list_item, null);
		}
		ArrayList<ArrayList<Double>> element = getItem(position);
		StringBuffer sb = new StringBuffer();
		EditorActivity.addElement(element, sb);
		
		TextView number = (TextView)convertView.findViewById(R.id.training_list_item_number);
		TextView text = (TextView)convertView.findViewById(R.id.training_list_item_text);
		
		text.setText(sb.toString());
		number.setText(String.valueOf(position) + '.');
		
		convertView.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Intent i = new Intent(getContext(), TrainingSetDetailActivity.class);
				i.putExtra(TrainingSetDetailActivity.INTENT_EXTRA_NUMBER, position);
				i.putExtra(TrainingSetDetailActivity.INTENT_EXTRA_DATA, getItem(position));
				((Activity)getContext()).startActivityForResult(i, position);
			}
		});
		
		return convertView;
	}

}