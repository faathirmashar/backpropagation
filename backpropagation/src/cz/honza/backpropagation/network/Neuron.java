package cz.honza.backpropagation.network;

import java.io.IOException;
import java.io.Writer;

public class Neuron {
	// weights[0] is -treshold
	public double[] weights;
	public double[] weightsDerivation;
	public double potential;
	public double output;
	public double derivation;
	public double moment;
	
	/**
	 * 
	 * @param inputCount number of inputs not counting treshold
	 */
	public Neuron(int inputCount)
	{
		inputCount++;
		moment = 0;
		weights = new double[inputCount];
		weightsDerivation = new double[inputCount];
		restart();
	}
	
	public void restart()
	{
		int inputCount = weights.length;
		final double mul = 1.0d / inputCount;
		for (int i = 0; i < inputCount; i++)
		{
			weights[i] = Math.random() * mul;
			weightsDerivation[i] = 0;
		}
	}
	
	public String toString()
	{
		StringBuffer sb = new StringBuffer();
		sb.append('[');
		for (int i = 0; i < weights.length; i++)
		{				
			sb.append(weights[i]);
			if (i < weights.length - 1)
				sb.append(", ");
		}
		sb.append(']');
		return sb.toString();
	}
	
	public void save(String tabs, Writer writer) throws IOException
	{
		writer.write(tabs);
		writer.write(Xml.TAG_START);
		writer.write(Xml.NEURON);
		writer.write(Xml.TAG_END);
		writer.write('\n');
		
		for (int i = 0; i < weights.length; i++)
		{
			writer.write(tabs + "\t");
			writer.write(Xml.TAG_START);
			writer.write(Xml.WEIGHT);
			writer.write(Xml.TAG_END);
			writer.write(String.valueOf(weights[i]));
			writer.write(Xml.TAG_TERMINATE_START);
			writer.write(Xml.WEIGHT);
			writer.write(Xml.TAG_END);
			writer.write('\n');
		}
		
		writer.write(tabs);
		writer.write(Xml.TAG_TERMINATE_START);
		writer.write(Xml.NEURON);
		writer.write(Xml.TAG_END);
		writer.write('\n');
	}
}
