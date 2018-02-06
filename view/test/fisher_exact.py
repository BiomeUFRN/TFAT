#!/usr/bin/env python
import sys
import scipy.stats as stats
oddsratio, pvalue = stats.fisher_exact([[sys.argv[1], sys.argv[2]], [sys.argv[3], sys.argv[4]]])
print round(pvalue,5)
