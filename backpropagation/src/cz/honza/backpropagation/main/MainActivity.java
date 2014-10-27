package cz.honza.backpropagation.main;

import java.io.IOException;
import java.io.StringWriter;

import cz.honza.backpropagation.NetworkApplication;
import cz.honza.backpropagation.R;
import cz.honza.backpropagation.export.ExportActivity;
import cz.honza.backpropagation.export.ImportActivity;
import cz.honza.backpropagation.learning.LearningActivity;
import cz.honza.backpropagation.network.visualisation.VisualisationActivity;
import cz.honza.backpropagation.result.ResultActivity;
import cz.honza.backpropagation.result.ResultInputActivity;
import cz.honza.backpropagation.util.NetworkActivity;
import android.os.Bundle;

public class MainActivity extends NetworkActivity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.main);
		setStartActivity(R.id.main_learning, LearningActivity.class);
		setStartActivity(R.id.main_network_visualisation, VisualisationActivity.class);
		setStartActivity(R.id.main_result_visualisation, ResultActivity.class);
		setStartActivity(R.id.main_result_input, ResultInputActivity.class);
		setStartActivity(R.id.main_export_xml, ExportActivity.class);
		setStartActivity(R.id.main_import_xml, ImportActivity.class);
	}

	@Override
	protected void onResume() {
		super.onResume();
		boolean enabled = (NetworkApplication.sNetwork != null);
		findViewById(R.id.main_network_visualisation).setEnabled(enabled);
		findViewById(R.id.main_result_visualisation).setEnabled(enabled);
		findViewById(R.id.main_result_input).setEnabled(enabled);
		findViewById(R.id.main_learning).setEnabled(enabled);
		findViewById(R.id.main_export_xml).setEnabled(enabled);
	}

	@Override
	protected void onDestroy() {
		if (NetworkApplication.sNetwork != null)
		{
			StringWriter writer = new StringWriter();
			try {
				NetworkApplication.sNetwork.save(writer);
				savePref(NetworkApplication.PREFS_STORED_NET, writer.toString());
			} catch (IOException e)
			{
				// ignore
			}
		}
		super.onDestroy();
	}
	
	
	
}
